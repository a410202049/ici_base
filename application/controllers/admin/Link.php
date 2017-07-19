<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Link extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$categorys = $this->db->get('link_category')->result_array();
		$arr['categorys'] = $categorys;
		$tid = $this->input->get('tid');
		$tid = $tid ? $tid : $categorys[0]['id'];
        $links = $this->db->order_by('sort', 'asc')->get_where('link',array('tid'=>$tid))->result_array();
        $typeNames = array_combine(array_column($categorys,'id'),$categorys);
        foreach ($links as $key => $value) {
            $links[$key]['parentid']= $value['pid'];
            $links[$key]['type']= $typeNames[$value['tid']]['name'];
            $links[$key]['status_class'] = $value['status']?'label-primary':'label-danger';
            $links[$key]['status'] = $value['status']?'true':'false';
        }

        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->tree->init($links);

        $tdStr = "<tr>
	        <td><label class='checkbox-inline i-checks'><div class='icheckbox_square-green'><input type='checkbox' class='message-check-one' value='\$id' /></div></label></td>
	        <td width='60px'><input type='text' class='form-control' name='order[\$id]' value='\$sort'></td>
	        <td>\$type</td>
	        <td>\$spacer\$name</td>
	        <td><label class='label label-sm \$status_class'> \$status</button></td>
	        <td>";

        if(checkAuth('Link','edit',$this->uid)){
          $tdStr.= "<a href='javascript:void(0)' class='btn btn-sm btn-primary edit-btn' data-val='\$id' ><i class='fa fa-edit'></i></a> ";
        }
        if(checkAuth('Link','del',$this->uid)){
          $tdStr.="<a href='javascript:void(0)' class='btn btn-sm btn-danger delete-btn' data-val='\$id' ><i class='fa fa-trash'></i></a>";
        }
       	$tdStr. "</td></tr>";
        $tr = $this->tree->get_tree(0, $tdStr);
        $arr['tr'] = $tr;
        $arr['tid'] = $tid;
		$this->twig->render('Link/index',$arr);
	}

	public function getLinks(){
		$typeId = $this->input->post('typeId');
		$where = array('status'=>'1','tid'=>$typeId);
		$id = $this->input->post('id');
		if($id){
			$where = array_merge($where, array('id !='=>$id));
		}
		$data = $this->db->get_where('link',$where)->result_array();

        foreach ($data as $key => $value) {
            $data[$key]['parentid']= $value['pid'];
        }
        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->tree->init($data);
        $str.= "<option value='\$id' >\$spacer\$name</option>";
        $menus = $this->tree->get_tree(0,$str,1);
        $menus = "<option value='0'>顶级链接</option>".$menus;
		$this->response_data('1','获取成功',$menus);
	}


	public function add(){
		$arr = $this->input->post();
		if(!$arr['name']){
			$this->response_data('0','链接名称不能为空');
		}
		if(!$arr['keywords']){
			$this->response_data('0','链接关键词不能为空');
		}
		if(!$arr['url']){
			$this->response_data('0','链接url不能为空');
		}
		if(!$arr['tid']){
			$this->response_data('0','请选择一个连接类型');
		}
		$data = array(
			'description' =>$arr['description'],
			'keywords' =>$arr['keywords'],
			'url' =>$arr['url'],
			'pid' =>$arr['pid'],
			'name' =>$arr['name'],
			'target'=>$arr['target'],
			'tid'=>$arr['tid']
		);
		$link =$this->db->get_where('link',array('name'=>$arr['name'],'pid'=>$arr['pid']))->row_array();
		if($link){
			$this->response_data('0','连接名称不能重复');
		}
		$this->db->insert('link',$data);
		$this->response_data('1','链接添加成功');
	}


	public function edit(){
		$arr = $this->input->post();
		if(!$arr['name']){
			$this->response_data('0','链接名称不能为空');
		}
		if(!$arr['keywords']){
			$this->response_data('0','链接关键词不能为空');
		}
		if(!$arr['url']){
			$this->response_data('0','链接url不能为空');
		}
		if(!$arr['tid']){
			$this->response_data('0','请选择一个连接类型');
		}
		$data = array(
			'description' =>$arr['description'],
			'keywords' =>$arr['keywords'],
			'url' =>$arr['url'],
			'pid' =>$arr['pid'],
			'name' =>$arr['name'],
			'router_url' =>$arr['router_url'],
			'target'=>$arr['target'],
			'tid'=>$arr['tid']
		);
		$link =$this->db->get_where('link',array('id !='=>$arr['id'],'name'=>$arr['name'],'pid'=>$arr['pid']))->row_array();
		if($link){
			$this->response_data('0','连接名称不能重复');
		}
		$this->db->update('link',$data,array('id'=>$arr['id']));
		$this->response_data('1','链接编辑成功');
	}

    public function order(){
        $orders = $this->input->post('order');
        foreach ($orders as $key => $value) {
            $this->db->update('link', array('sort'=>$value), array('id'=>$key));
        }
        $this->response_data('1','排序成功');
    }

    public function getLink(){
    	$arr = $this->input->post();
    	$data = $this->db->get_where('link',array('id'=>$arr['id']))->row_array();
    	$this->response_data('1','获取成功',$data);
    }


    public function del(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            if(is_array($id)){
                $this->db->where_in('id',$id);
                $this->db->delete('link');
            }else{
                $this->db->delete('link', array('id'=>$id));
            }
            $this->response_data('1','删除成功');//删除成功
        }
    }

}
