<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManage extends admin_Auth_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$attArr = $this->input->get();
    	$where = "";
    	if($attArr['account']){
    		$where.= ' and (u.realname like "%'.$attArr['account'].'%" or u.email like "%'.$attArr['account'].'%") ';
    	}
    	if($attArr['roleType'] !="" && $attArr['roleType'] !='-1'){
    		$where.= ' and g.id='.$attArr['roleType'];
    	}
    	if($attArr['status'] !="" && $attArr['status'] !='-1'){
    		$where.= ' and u.status='.$attArr['status'];
    	}

		$sql = "SELECT u.username,u.id,u.realname,u.email,u.status,g.name as group_name,g.id as group_id,g.status as group_status from ci_user as u LEFT JOIN ci_user_group as g on g.id = u.group_id where 1=1 ".$where;

    	$page['query'] = $sql;
        // $page['perpage'] = 1;
    	$users = $this->page($page);
    	$arr['users'] = $users;
	    $arr['pager'] = $this->pager;
	    $arr['roles'] = $this->db->get_where('user_group',array('status'=>'1'))->result_array();
	    $arr['getArr'] = $attArr;
        $this->twig->render('UserManage/index',$arr);
    }


    public function getUserRoles(){
    	$roles = $this->db->get('user_group')->result_array();
    	$this->response_data('1','获取成功',$roles);//获取成功
    }

    /**
     * [userEnable 用户的禁用启用操作]
     * @return [type] [description]
     */
    public function isEnable(){
        $uid = $this->input->post('uid');
        $data = $this->db->get_where('user', array('id'=>$uid))->row_array();
        if(!$data){
            $this->response_data('0','用户不存在');//用户不存在
        }
        if($data['status']){
            $this->db->update('user', array('status'=>0), array('id'=>$uid));
            $this->response_data('1','禁用成功');//禁用成功
        }else{
            $this->db->update('user', array('status'=>1), array('id'=>$uid));
            $this->response_data('1','启用成功');//启用成功
        }
    }

    public function del(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            if(is_array($id)){
                $this->db->where_in('id',$id);
                $this->db->delete('user');
            }else{
                $this->db->delete('user', array('id'=>$id));
            }
            $this->response_data('1','删除成功');//删除成功
        }
    }

    public function add(){
        $arr = $this->input->post();
        if(empty($arr['realname'])){
          $this->response_data('0','真实名称不能为空');
        }
        $data['realname'] = $this->input->post('realname');
        $data['password'] = do_hash($this->input->post('password'));
        $data['username'] = $this->input->post('username');
        $data['group_id'] = $this->input->post('user_role');
        $data['email'] = $this->input->post('email');
        $ret = $this->db->get_where('user', array('username'=>$data['username']))->row_array();
        if(!empty($ret)){
            $this->response_data('0','用户名已经存在');//用户名已经存在
        }
        $ret_email = $this->db->get_where('user', array('email'=>$data['email']))->row_array();
        if(!empty($ret_email)){
            $this->response_data('0','邮箱已存在');//邮箱已存在
        }
        if(empty($data['password'])){
            $this->response_data('0','密码不能为空');//密码不能为空
        }
        $pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        if(!preg_match($pattern,$data['email'])){
          $this->response_data('0','邮箱格式错误');//邮箱格式错误
        }
        //添加用户
        $this->db->insert('user', $data);
        $uid = $this->db->insert_id();
        if($uid){
            $this->response_data('1','添加成功');//添加成功
        }else{
            $this->response_data('0','添加失败');//添加失败
        }

    }

    public function edit(){
        $uid = $this->input->post('uid');
        $realname = $this->input->post('realname');
        $password = $this->input->post('password');
        $group_id = $this->input->post('user_role');

        if(empty($realname)){
            $this->response_data('0','真实名字不能为空');//真实名字不能为空
        }
        $userdata = array(
            'realname' => $realname,
            'group_id' => $group_id
        );
        if($password){
          $userdata['password'] = do_hash($password);
        }
        $this->db->update('user',$userdata, array('id'=>$uid));
        $this->response_data('1','编辑成功');//编辑成功
    }


    public function getUserInfo(){
    	$arr = $this->input->post();
    	$uid = $arr['uid'];
        $sql = "SELECT u.username,u.id,u.realname,u.email,u.status,g.name as group_name,g.id as group_id,g.status as group_status from ci_user as u LEFT JOIN ci_user_group as g on g.id = u.group_id where u.id=".$uid;
        $user = $this->db->query($sql)->row_array();
    	$this->response_data('1','获取成功',$user);
    }



}
