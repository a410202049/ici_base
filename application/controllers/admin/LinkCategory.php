<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LinkCategory extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$sql = "select t1.*,case when t2.name IS NULL  then '顶级分类' else t2.name end as pname from ci_link_category t1 left join ci_link_category t2 on t1.pid=t2.id order by t1.sort desc,t1.createtime desc";
    	$page['query'] = $sql;
    	$data = $this->page($page);
    	$arr['pager'] = $this->pager;
		$arr['categorys'] = $data;
		$this->twig->render('LinkCategory/index',$arr);
	}

	public function add(){
		$arr = $this->input->post();
		$name = $arr['name'];
		$identityKey = $arr['identityKey'];
		if(!preg_match($this->regular['noEmpty'],$name)){
			$this->response_data('0','请填写分类名称');
		}
		if(!preg_match($this->regular['identityKey'],$identityKey)){
			$this->response_data('0','identityKey 格式错误');
		}
		$ret = $this->db->insert('link_category',array('identity_key'=>$identityKey,'name'=>$name,'createtime'=>date('Y-m-d H:i:s', time())));
		$this->response_data('1','分类添加成功');
	}
	public function edit(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$name = $arr['name'];
		$identityKey = $arr['identityKey'];
		if(!preg_match($this->regular['noEmpty'],$name)){
			$this->response_data('0','请填写分类名称');
		}
		if(!preg_match($this->regular['identityKey'],$identityKey)){
			$this->response_data('0','identityKey 格式错误');
		}
		$this->db->update('link_category',array('identity_key'=>$identityKey,'name'=>$name,'template'=>$template),array('id'=>$id));
		$this->response_data('1','分类编辑成功');
	}

    public function order(){
        $orders = $this->input->post('order');
        foreach ($orders as $key => $value) {
            $this->db->update('link_category', array('sort'=>$value), array('id'=>$key));
        }
        $this->response_data('1','排序成功');
    }

    public function del(){
        $cid = $this->input->post('cid');
        $this->db->delete('link_category',array('id'=>$cid));
        $this->response_data('1','删除成功');
    }

	public function getCategorys(){
    	$categorys = $this->db->get('link_category')->result_array();
    	$this->response_data('1','获取成功',$categorys);//获取成功
	}

	public function getCategoryInfo(){
		$arr = $this->input->post();
		$cid = $arr['cid'];
		$category = $this->db->get_where('link_category',array('id'=>$cid))->row_array();
		$this->response_data('1','获取成功',$category);//获取成功
	}

	public function getCurrentCategorys(){
		$arr = $this->input->post();
		$cid = $arr['cid'];
    	$categorys = $this->db->get_where('link_category',array('id !='=>$cid))->result_array();
    	$this->response_data('1','获取成功',$categorys);//获取成功
	}


}
