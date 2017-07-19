<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$getArr = $this->input->get();
		$article_category = $this->db->get('article_category')->result_array();

        $where = "where is_del = '0'";
        if($getArr['title']){
            $where.= " and a.title like '%".$getArr['title']."%'";
        }
        if($getArr['cid'] && $getArr['cid'] !='-1'){
            $where.= " and a.cid = ".$getArr['cid'];
        }

        $sql = "select a.*, case when cate.name IS NULL then '未分类' else cate.name end as cname from ci_article as a left join ci_article_category as cate on a.cid = cate.id ".$where." order by createtime desc";
        $page['query'] = $sql;
        $articles = $this->page($page);
        $arr['pager'] = $this->pager;
        foreach ($articles as $key => $value) {
		$sideTable = array(
			array(
				'table'=>'tags',
				'alias'=>'tag',
				'condition'=>'r.tag_id = tag.id',
				'type'=>'left'
			)
		);
		$tags = $this->data->join("tag.id,tag.name,tag.color,tag.fontcolor,tag.bordercolor","relation_tags as r",$sideTable,false ,array('r.object_id'=>$value['id'],'r.type'=>'article'));
        	$articles[$key]['tags'] = $tags;
        }
        
        $arr['articles'] = $articles;
		$arr['categorys'] = $article_category;
		$arr['getArr'] = $getArr;
		$this->twig->render('Article/index',$arr);
	}




	public function add(){
		$arr = $this->input->post();

		$arr['content'] = str_replace('src="'.base_url(),'src="', $arr['content']);
		$cid = $arr['cid'];
		$publishtime = $arr['publishtime'];
		$cover_img = $arr['cover_img'];
		$title = $arr['title'];
		$description = $arr['description'];
		$tags = $arr['tags'];
		$is_comment = $arr['is_comment'];
		$is_top = $arr['is_top'];
		$hit_num = $arr['hit_num'] ? $arr['hit_num'] : '0';
		$release_source = $arr['release_source'];
		$content = $arr['content'];
		// date('Y-m-d H:i:s', time()
		if(empty($title)){
			$this->response_data('0','文章标题不能为空');
		}
		if(empty($content)){
			$this->response_data('0','文章内容不能为空');
		}
		$article = array(
			'cid' =>$cid,
			'publishtime' => $publishtime ? $publishtime : date('Y-m-d H:i:s', time()),
			'cover_img' =>$cover_img,
			'title'=>$title,
			'description' => $description,
			'is_comment' =>$is_comment,
			'is_top' => $is_top,
			'hit_num' =>$hit_num,
			'release_source'=>$release_source,
			'content'=>$content,
			'createtime'=>date('Y-m-d H:i:s', time()),
			'updatetime'=>date('Y-m-d H:i:s', time()),
			'author_id'=>$this->uid
		);
		$this->db->insert('article',$article);
		$aid = $this->db->insert_id();
		if($tags){
			foreach ($tags as $key => $value) {
				$tagData = array(
					'object_id' => $aid,
					'type' => 'article',
					'tag_id' => $value
				);
				$this->db->insert('relation_tags',$tagData);
			}
		}
		$this->response_data('1','文章添加成功');

	}

	public function edit(){
		$arr = $this->input->post();
		// $arr['content'] = str_replace('src="'.base_url(),'src="', $arr['content']);
		$id = $arr['id'];
		$cid = $arr['cid'];
		$publishtime = $arr['publishtime'];
		$cover_img = $arr['cover_img'];
		$title = $arr['title'];
		$description = $arr['description'];
		$tags = $arr['tags'];
		$is_comment = $arr['is_comment'];
		$is_top = $arr['is_top'];
		$hit_num = $arr['hit_num'];
		$release_source = $arr['release_source'];
		$content = $arr['content'];
		// date('Y-m-d H:i:s', time()
		if(empty($title)){
			$this->response_data('0','文章标题不能为空');
		}
		if(empty($content)){
			$this->response_data('0','文章内容不能为空');
		}
		$article = array(
			'cid' =>$cid,
			'publishtime' => $publishtime ? $publishtime : date('Y-m-d H:i:s', time()),
			'cover_img' =>$cover_img,
			'title'=>$title,
			'description' => $description,
			'is_comment' =>$is_comment,
			'is_top' => $is_top,
			'hit_num' =>$hit_num,
			'release_source'=>$release_source,
			'content'=>$content,
			'updatetime'=>date('Y-m-d H:i:s', time()),
			'author_id'=>$this->uid
		);
		$this->db->update('article',$article,array('id'=>$id));
		if($tags){
			$this->db->delete('relation_tags',array('object_id'=>$id,'type'=>'article'));
			foreach ($tags as $key => $value) {
				$tagData = array(
					'object_id' => $id,
					'type' => 'article',
					'tag_id' => $value
				);
				$this->db->insert('relation_tags',$tagData);
			}
		}
		$this->response_data('1','文章编辑成功');
	}

	public function del(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$this->db->update('article',array('is_del'=>'1'),array('id'=>$id));
		$this->response_data('1','文章删除成功');
	}

	public function addTpl(){
		$article_category = $this->db->get('article_category')->result_array();
		$arr['categorys'] = $article_category;
		$this->twig->render('Article/addTpl',$arr);
	}

	public function editTpl(){
		$arr = $this->input->get();
		$this->load->model('article_model','article');
		$article = $this->article->getArticle($arr['id']);
		$categorys = $this->db->get('article_category')->result_array();
		$arr['article'] = $article;
		$arr['categorys'] = $categorys;
		$this->twig->render('Article/editTpl',$arr);
	}

	public function status(){
		$arr = $this->input->post();
		$id = $arr['id'];
		$article = $this->db->get_where('article',array('id'=>$id))->row_array();
		if($article['is_show']){
			$this->db->update('article',array('is_show'=>'0'),array('id'=>$id));
			$this->response_data('1','取消成功');
		}else{
			$this->db->update('article',array('is_show'=>'1'),array('id'=>$id));
			$this->response_data('1','发布成功');
		}
	}



}
