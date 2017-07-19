<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ArticleComment extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $sql = "select c.*,a.title from ci_article_comment as c left join ci_article as a on a.id = c.article_id where c.is_del = 0 order by createtime desc ";
        $page['query'] = $sql;
        $comments = $this->page($page);
        $arr['pager'] = $this->pager;
        $arr['comments'] = $comments;
		$this->twig->render('ArticleComment/index',$arr);
	}





	public function del(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$this->db->update('article_comment',array('is_del'=>'1'),array('id'=>$id));
		$this->response_data('1','评论删除成功');
	}


	public function status(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$article = $this->db->get_where('article_comment',array('id'=>$id))->row_array();
		if($article['is_show']){
			$this->db->update('article_comment',array('is_show'=>'0'),array('id'=>$id));
			$this->response_data('1','取消成功');
		}else{
			$this->db->update('article_comment',array('is_show'=>'1'),array('id'=>$id));
			$this->response_data('1','发布成功');
		}
	}

	public function reply(){
		$arr = $this->input->post();
		// print_r($arr);exit;
		$this->db->update('article_comment',array('reply'=>$arr['data'],'reply_time'=>date('Y-m-d H:i:s', time())),array('id'=>$arr['id']));
		$this->response_data('1','回复成功');
	}


}
