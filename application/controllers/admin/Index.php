<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->twig->render('Index/index');
	}

	public function upload(){
		$folder = $this->input->get('folder');
        $size = $this->input->get('size');//宽度*高度 

        $config['upload_path']      = $folder ? 'uploads/'.$folder.'/' : 'uploads/' ;
        $config['allowed_types']    = 'gif|jpg|png|bmp|jpeg|webp';
        $config['file_ext_tolower'] = true;
        $config['encrypt_name'] = true;
        $config['file_name']  = md5(microtime()); //文件名不使用原始名
        
        if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'],0777,true);
        }

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('file')){
            $this->response_data('0',strip_tags($this->upload->display_errors()));//上传失败
        }
        else{
            $files = $this->upload->data();
            if($size){
                $arrs = explode("*",$size);
                $this->load->library('image');
                $this->image->load($config['upload_path'].$files['file_name'])->quality(0)->size($arrs[0], $arrs[1])->fixed_given_size(true)->save($config['upload_path'].'cut_'.$files['file_name']);
                $file['cut_img'] = $config['upload_path'].'cut_'.$files['file_name'];
            }
            $file['file_name'] = $files['file_name'];
            $file['url'] = $config['upload_path'].$files['file_name'];
            $this->response_data('1','上传成功',$file);//上传成功
        }
	}

}
