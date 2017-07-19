<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends Home_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('article_model');
		$ym = $this->article_model->article_filed();//年月归档
		$this->twig->assign('ym',$ym);
	}

	public function articleList($page_index = 1,$cid = null ){
		$articles = $this->article_model->gets_by_article($page_index,15);
		$data['articles'] = $articles;
		$hots = $this->article_model->gets_by_article('1','5','hot');
		$data['hots'] = $hots;
		$data['page_index'] = $page_index;
		// $this->output->enable_profiler(TRUE);
	 	$this->twig->render('Article/list',$data);
	}

	public function articleDate($date,$page_index = 1){
		$articles = $this->article_model->gets_by_article($page_index,15,'date',$date);
		$data['articles'] = $articles;
		$hots = $this->article_model->gets_by_article('1','5','hot');
		$data['hots'] = $hots;
		$data['page_index'] = $page_index;
		// $this->output->enable_profiler(TRUE);
	 	$this->twig->render('Article/list',$data);
	}

	public function articleTags($tid,$page_index = 1){
		$articles = $this->article_model->gets_by_article($page_index,15,'tags',$tid);
		$data['articles'] = $articles;
		$hots = $this->article_model->gets_by_article('1','5','hot');
		$data['hots'] = $hots;
		$data['page_index'] = $page_index;
		// $this->output->enable_profiler(TRUE);
	 	$this->twig->render('Article/list',$data);
	}

	public function detail($article_id){
		$data = $this->article_model->getArticle($article_id);
		$this->article_model->add_hit_num($article_id);
		$arr['article'] = $data;
		$rands = $this->article_model->gets_by_article('1','5','rand');
		$arr['rands'] = $rands;
		$arr['about'] = $this->article_model->about_articles($article_id);
		$arr['prev_next'] = $this->article_model->article_prev_next($article_id);
		$arr['comments'] = $this->article_model->get_article_comments($article_id);
	 	$this->twig->render('Article/detail',$arr);
	}

	public function search($page_index = 1){
		$keyword = $this->input->get('keyword');
		$articles = $this->article_model->gets_by_article($page_index,2,'search',$keyword);
		$data['articles'] = $articles;
		$hots = $this->article_model->gets_by_article('1','5','hot');
		$data['hots'] = $hots;
		$data['page_index'] = $page_index;
		// $this->output->enable_profiler(TRUE);
	 	$this->twig->render('Article/list',$data);
	}

	public function articleCategory($cid,$page_index = 1){
		$articles = $this->article_model->gets_by_article($page_index,15,'category',$cid);
		$data['articles'] = $articles;
		$hots = $this->article_model->gets_by_article('1','5','hot');
		$data['hots'] = $hots;
		$data['page_index'] = $page_index;
		// $this->output->enable_profiler(TRUE);
	 	$this->twig->render('Article/category',$data);
	}

	/**
	 * [commentContent 添加评论]
	 * @return [type] [description]
	 */
	public function commentContent(){
		$post = $this->input->post();
		$nickname = safe_replace(remove_xss($post['nickname']));
		$articleid = $post['articleid'];
		$promptText = safe_replace(remove_xss($post['promptText']));
		$web_email	 = safe_replace(remove_xss($post['web_email']));
		if(empty($nickname)){
			$this->response_data('0','昵称不能为空');
		}

		if(empty($promptText)){
			$this->response_data('0','评论不能为空');
		}

		if($web_email){
			if(preg_match("/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\"])*$/", $web_email)){
				$arr['website'] = $web_email;
			}
			if(preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/",$web_email)){
				$arr['email'] = $web_email;
			}

			if(!preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/",$web_email) && !preg_match("/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\"])*$/", $web_email)){
				$this->response_data('0','邮箱或网址的格式不正确');
			}
		}

		$arr['nickname'] = $nickname;
		$arr['article_id'] = $articleid;
		$arr['content'] = $promptText;
		$arr['createtime'] = date('Y-m-d H:i:s', time());
		$this->db->insert('ci_article_comment',$arr);
		$this->response_data('1','评论成功，请等待管理员审核');
	}
}
