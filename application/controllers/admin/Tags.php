<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tags extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$where = "";
		$tagname = $this->input->get('tagname');
    	if($tagname){
    		$where = " where name like '%".$tagname."%'";
    	}
		$sql = "select * from ci_tags".$where;
    	$page['query'] = $sql;
    	$data = $this->page($page);
    	$arr['pager'] = $this->pager;
		$arr['tags'] = $data;
		$this->twig->render('Tags/index',$arr);
	}




	public function add(){
		$arr = $this->input->post();
		if(!$arr['name']){
			$this->response_data('0','请填写标签名称');
		}
		$data = $this->db->get_where('tags',array('name'=>$arr['name']))->row_array();
		if($data){
			$this->response_data('0','标签名已存在');
		}
		$this->db->insert('tags',array('name'=>$arr['name'],'bordercolor'=>$arr['bordercolor'],'fontcolor'=>$arr['fontcolor'],'color'=>$arr['color']));
		$this->response_data('1','标签添加成功');
	}

	public function edit(){
		$arr = $this->input->post();
		if(!$arr['name']){
			$this->response_data('0','请填写标签名称');
		}
		$this->db->update('tags',array('name'=>$arr['name'],'bordercolor'=>$arr['bordercolor'],'fontcolor'=>$arr['fontcolor'],'color'=>$arr['color']),array('id'=>$arr['id']));
		$this->response_data('1','标签添加成功');
	}

	public function del(){
		$id = $this->input->post('id');
		$this->db->delete('tags',array('id'=>$id));
		$this->db->delete('relation_tags',array('tag_id'=>$id));
		$this->response_data('1','标签删除成功');
	}

	public function getTagInfo(){
		$id = $this->input->post('id');
		$data = $this->db->get_where('tags',array('id'=>$id))->row_array();
		$this->response_data('1','获取成功',$data);
	}

	/**
	 * [getUserJson 获取用户列表]
	 */
	public function getTagsJson(){
		if(IS_AJAX){
			$tagName = $this->input->get('tagName');
			$tagName = $this->db->query("select * from ci_tags where name like '%".$tagName."%'")->result_array();
			$this->response_data('success','获取成功',$tagName);
		}
	}


}
