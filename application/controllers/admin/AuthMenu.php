<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthMenu extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $rules = $this->db->select('*')->order_by('sort', 'asc')->get('auth_menu')->result_array();
        foreach ($rules as $key => $value) {
            $rules[$key]['order'] = $value['sort'];
            $rules[$key]['parentid']= $value['parent'];
            $rules[$key]['name'] = $value['name'];
            $rules[$key]['class'] = $value['class'];
            $rules[$key]['method'] = $value['method'];
            $rules[$key]['status_class'] = $value['status']?'label-primary':'label-danger';    
            $rules[$key]['status'] = $value['status']?'true':'false';
        }

        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->tree->init($rules);
        $str = "<option value=\$id >\$spacer\$name</option>";
        $menus = $this->tree->get_tree(0,$str,1);
        
        $tdStr = "<tr>
                    <td><label class='checkbox-inline i-checks'><div class='icheckbox_square-green'><input type='checkbox' class='message-check-one' value='\$id' /></div></label></td>
                    <td width='60px'><input type='text' class='form-control' name='order[\$id]' value='\$order'></td>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td>\$class</td>
                    <td>\$method</td>
                    <td><label class='label label-sm \$status_class'> \$status</button></td>
                    <td>";

                    if(checkAuth('AuthMenu','edit',$this->uid)){
                      $tdStr.= "<a href='javascript:void(0)' class='btn btn-sm btn-primary edit-btn' data-val='\$id' ><i class='fa fa-edit'></i></a> "; 
                    }
                    if(checkAuth('AuthMenu','del',$this->uid)){
                      $tdStr.="<a href='javascript:void(0)' class='btn btn-sm btn-danger delete-btn' data-id='\$id' ><i class='fa fa-trash'></i></a>";
                    }

                   $tdStr. "</td></tr>";
        $this->tree->init($rules);
        $tr = $this->tree->get_tree(0, $tdStr);
        $arr['menus'] = $menus;
        $arr['tr'] = $tr;
        $this->twig->render('AuthMenu/index',$arr);
	}


    public function add(){
        if($this->input->is_ajax_request()){
            $name = trim($this->input->post('name'));
            $class = trim($this->input->post('class'));
            $method = trim($this->input->post('method'));
            $icon = $this->input->post('icon');
            $pid = $this->input->post('pid');
            if(!$name){
                $this->response_data('0','菜单不能为空');//菜单不能为空
            }
            $data = $this->db->get_where('auth_menu', array('name'=>$name,'parent'=>$pid))->row_array();
            if($data){
                $this->response_data('0','菜单已经存在');//菜单已经存在
            }

            $status = $this->db->insert('auth_menu',array('name'=>$name,'status'=>'1','class'=>$class,'method'=>$method,'parent'=>$pid,'icon'=>$icon));
            if($status){
                $this->response_data('1','菜单添加成功');
            }
        }
    }



    /**
     * 编辑保存菜单
     */
    public function edit(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $parent = $this->input->post('parent');
            $icon = $this->input->post('icon');
            $name = $this->input->post('name');
            $method = $this->input->post('method');
            $class = $this->input->post('class');
            if(empty($name)){
                $this->response_data('0','菜单名称不能为空');//菜单名称不能为空
            }
            $this->db->update('auth_menu', array('class'=>$class,'method'=>$method,'name'=>$name,'status'=>$status,'parent'=>$parent,'icon'=>$icon), array('id'=>$id));
            $this->response_data('1','菜单编辑成功');//菜单编辑成功
        }
    }

    public function del(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            if(is_array($id)){
                $this->db->where_in('id',$id);
                $this->db->delete('auth_menu');
            }else{
                $this->db->delete('auth_menu', array('id'=>$id));
            }
            $this->response_data('1','删除成功');//删除成功
        }
    }

    public function order(){
        $orders = $this->input->post('order');
        foreach ($orders as $key => $value) {
            $this->db->update('auth_menu', array('sort'=>$value), array('id'=>$key));
        }
        $this->response_data('1','排序成功');
    }


    /**
     * 获取不包含本身菜单的层级
     */
    public function ajaxGetMenu(){
        if($this->input->is_ajax_request()){
           $mid = trim($this->input->post('id'));
            $rules = $this->db->select('*')->order_by('sort', 'asc')->get_where('auth_menu',array('id!='=>$mid))->result_array();
            foreach ($rules as $key => $value) {
                $rules[$key]['order'] = $value['sort'];
                $rules[$key]['parentid']= $value['parent'];
                $rules[$key]['name'] = $value['name'];
                $rules[$key]['class'] = $value['class'];
                $rules[$key]['method'] = $value['method'];
                $rules[$key]['status_class'] = $value['status']?'label-primary':'label-danger';    
                $rules[$key]['status'] = $value['status']?'true':'false';
            }
            $this->load->library('tree');
            $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $this->tree->init($rules);
            $str = "<option value=\$id >\$spacer\$name</option>";
            $menus = $this->tree->get_tree(0,$str,1);
            $arr['menus'] = '<option value="0">--顶级菜单--</option>'.$menus;
            $info = $this->db->select('*')->get_where('auth_menu',array('id='=>$mid))->row_array();
            $arr['info'] = $info;
            $this->response_data('1','获取成功',$arr);//获取成功

        }
    }

}
