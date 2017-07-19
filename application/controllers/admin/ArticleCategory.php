<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ArticleCategory extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$sql = "select t1.*,case when t2.name IS NULL  then '顶级分类' else t2.name end as pname from ci_article_category t1 left join ci_article_category t2 on t1.pid=t2.id order by t1.sort desc,t1.createtime desc";

		$data = $this->db->query($sql)->result_array();

        foreach ($data as $key => $value) {
            $data[$key]['order'] = $value['sort'];
            $data[$key]['parentid']= $value['pid'];
            $data[$key]['description'] = $value['description'];
            $data[$key]['pname'] = $value['pname'];
            $data[$key]['name'] = $value['name'];
        }
        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->tree->init($data);


		$tdStr = "<tr>
		    <td ><input type='text' class='form-control' name='order[\$id]' value='\$sort'></td>
		    <td>\$id</td>
		    <td>\$spacer\$name</td>
		    <td>\$description</td>
		    <td>\$pname</td>
		    <td>";



		if(checkAuth('ArticleCategory','edit',$this->uid)){
		  $tdStr.= "<a href='javascript:void(0)' class='btn btn-sm btn-primary edit-btn' data-id='\$id' ><i class='fa fa-edit'></i></a> "; 
		}
		if(checkAuth('ArticleCategory','del',$this->uid)){
		  $tdStr.="<a href='javascript:void(0)' class='btn btn-sm btn-danger delete-btn' data-val='\$id' ><i class='fa fa-trash'></i></a>";
		}

		$tdStr. "</td></tr>";

		$tr = $this->tree->get_tree(0, $tdStr);


		$arr['categorys'] = $data;

		$arr['tr'] = $tr;
		$this->twig->render('ArticleCategory/index',$arr);
	}

	public function add(){
		$arr = $this->input->post();
		$pid = $arr['pid'];
		$name = $arr['name'];
		$description = $arr['description'];
		$template = $arr['template'];
		if(!preg_match($this->regular['noEmpty'],$name)){
			$this->response_data('0','请填写分类名称');
		}
		$ret = $this->db->insert('article_category',array('pid'=>$pid,'description'=>$description,'name'=>$name,'createtime'=>date('Y-m-d H:i:s', time())));
		$this->response_data('1','分类添加成功');
	}
	public function edit(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$pid = $arr['pid'];
		$name = $arr['name'];
		$description = $arr['description'];
		$template = $arr['template'];
		if(!preg_match($this->regular['noEmpty'],$name)){
			$this->response_data('0','请填写分类名称');
		}
		$this->db->update('article_category',array('pid'=>$pid,'description'=>$description,'name'=>$name),array('id'=>$id));
		$this->response_data('1','分类编辑成功');
	}

    public function order(){
        $orders = $this->input->post('order');
        foreach ($orders as $key => $value) {
            $this->db->update('article_category', array('sort'=>$value), array('id'=>$key));
        }
        $this->response_data('1','排序成功');
    }

    public function del(){
        $cid = $this->input->post('cid');
        $this->db->delete('article_category',array('id'=>$cid));
        $this->response_data('1','删除成功');
    }

	public function getCategorys(){
    	$categorys = $this->db->get('article_category')->result_array();
    	$this->response_data('1','获取成功',$categorys);//获取成功
	}

	public function getCategoryInfo(){
		$arr = $this->input->post();
		$cid = $arr['cid'];
		$category = $this->db->get_where('article_category',array('id'=>$cid))->row_array();
		$this->response_data('1','获取成功',$category);//获取成功
	}

	public function getCurrentCategorys(){
		$arr = $this->input->post();
		$cid = $arr['cid'];
    	$categorys = $this->db->get_where('article_category',array('id !='=>$cid))->result_array();
    	$this->response_data('1','获取成功',$categorys);//获取成功
	}


}
