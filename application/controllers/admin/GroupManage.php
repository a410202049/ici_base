<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupManage extends admin_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
    	$role_keywords = $this->input->get('role_keywords');
    	$where = "";
    	if($role_keywords){
    		$where = "and name like '%".$role_keywords."%'";
    	}
    	$sql = "select * from ci_user_group where 1=1 ".$where;
    	$page['query'] = $sql;
    	$groupData = $this->page($page);
    	$arr['groupData'] = $groupData;
	    $arr['pager'] = $this->pager;
        $this->twig->render('GroupManage/index',$arr);
    }


    public function add(){
        $arr = $this->input->post();
        $rolename = $arr['rolename'];
        $description = $arr['description'];
        if(!$rolename){
            $this->response_data('0','角色名不能为空');//角色名不能为空
        }

        $this->db->insert('user_group', 
            array(
                'name'=>$rolename,
                'description'=>$description,
                'status'=>'1',
                'create_time'=>date('Y-m-d H:i:s', time())
                )
            );
        $this->response_data('1','添加成功');//添加成功
    }


    public function edit(){
        $arr = $this->input->post();
        $rolename = $arr['rolename'];
        $description = $arr['description'];
        $groupid = $arr['groupid'];
        if(!$rolename){
            $this->response_data('0','角色名不能为空');//角色名不能为空
        }

        $this->db->update('user_group', 
            array(
                'name'=>$rolename,
                'description'=>$description,
                'status'=>'1'
                ),
            array(
                'id'=>$groupid
            )
        );
        $this->response_data('1','编辑成功');//编辑成功
    }



    /**
     * [获取分组信息]
     * @return [type] [description]
     */
    public function getRoleInfo(){
      $rid = $this->input->post('rid');
      $data = $this->db->get_where('user_group',array('id'=>$rid))->row_array();
      $this->response_data('1','获取成功',$data);
    }


    /**
     * [siteEnable 禁用分组]
     * @return [type] [description]
     */
    public function isEnable(){
        $rid = $this->input->post('rid');
        $data = $this->db->get_where('user_group', array('id'=>$rid))->row_array();
        if($data['status'] == '1'){
            $this->db->update('user_group', array('status'=>'0'), array('id'=>$rid));
            $this->response_data('1','禁用成功');//禁用成功
        }else if($data['status']=='0'){
            $this->db->update('user_group', array('status'=>'1'), array('id'=>$rid));
            $this->response_data('1','启用成功');//启用成功
        }
    }


    /**
     * [getAuthList description]
     * @return [type] [description]
     */
    public function getAuthList(){
      	$rules = $this->db->select('*')->order_by('sort','asc')->get('auth_menu')->result_array();
      	$arr = $this->input->post();
      	$rid = $arr['rid'];
      	$groupData = $this->db->get_where('user_group',array('id'=>$rid))->row_array();
        $userRules = unserialize($groupData['rules']) ? unserialize($groupData['rules']) : array();
        foreach ($rules as $key => $value) {
          $methods = $value['method'] ? explode(',', $value['method']) : '';
          $rules[$key]['method'] = $methods;
        }

        if($userRules){
            foreach ($rules as $key => $value) {
              foreach ($userRules as $k => $v) {
                if($value['id']==$v['id']){
                  if(!empty($value['method'])){
                    foreach ($value['method'] as $mk => $mv) {
                      foreach ($v['rule'] as $rk => $rv) {
                        if($mv == $rv){
                          $rules[$key]['method'][$mk] = array('name'=>$mv,'active'=>'1');
                          break;
                        }
                        $rules[$key]['method'][$mk] = array('name'=>$mv,'active'=>'0');
                      }
                    }
                  }
                  $rules[$key]['active'] = '1';
                  break;
                }
                $rules[$key]['active'] = '0';
                if($value['method']){
                  foreach ($value['method'] as $k => $v) {
                    $rules[$key]['method'][$k] = array('name'=>$v,'active'=>'0');
                  }
                }

              }
            }
        }else{
            foreach ($rules as $key => $value) {
                if($value['method']){
                  foreach ($value['method'] as $k => $v) {
                    $rules[$key]['method'][$k] = array('name'=>$v,'active'=>'0');
                  }
                }
            }
        }


        $rules = tree($rules,0,'parent');
        $this->response_data('1','获取成功',$rules);//获取成功
    }



    public function grant(){
        $arr = $this->input->post();
        $rules = $arr['checked'];
        $newArr = array();
        foreach ($rules as $key => $value) {
        if(is_array($value)){
            $newArr[$key]['id'] = $key;
            $newArr[$key]['rule'] = $value;
        }else{
            $newArr[$key]['id'] = $key;
            $newArr[$key]['rule'] = array();
        }
        }
        $rules = serialize(array_values($newArr));
        $this->db->update('user_group',array('rules'=>$rules),array('id'=>$arr['groupid']));
        $this->response_data('1','编辑成功');//编辑成功
    }    


    public function del(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            $user = $this->db->get_where('user',array('group_id'=>$id))->row_array();
            if($user){
                $this->response_data('0','删除失败');//删除失败
            }
            if(is_array($id)){
                $this->db->where_in('id',$id);
                $this->db->delete('user_group');
            }else{
                $this->db->delete('user_group', array('id'=>$id));
            }
            $this->response_data('1','删除成功');//删除成功
        }

    }

}
