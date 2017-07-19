<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SiteSeting extends admin_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
	    $arr['site'] = $this->db->get('site_config')->row_array();
		$this->twig->render('SiteSeting/index',$arr);
	}

	public function baseConfig(){
		$arr = $this->input->post();
		$data = $this->db->get('site_config')->row_array();
		if($data){
			$this->db->update('site_config',$arr);
		}else{
			$this->db->insert('site_config',$arr);
		}
		$this->response_data('1','编辑成功');
	}

	public function contactConfig(){
		$arr = $this->input->post();
		$data = $this->db->get('site_config')->row_array();
		if($data){
			$this->db->update('site_config',$arr);
		}else{
			$this->db->insert('site_config',$arr);
		}
		$this->response_data('1','编辑成功');
	}

	/**
	 * [userProfile 用户中心]
	 * @return [type] [description]
	 */
	public function userProfile(){
		$arr = $this->input->post();
		$nickname = $arr['nickname'];
		$email = $arr['email'];
		$mobile = $arr['mobile'];
		$photo = $arr['photo'];
		$nickname = $arr['nickname'];
		$password = $arr['password'];
		$sex = $arr['sex'];
		$user_profile = $arr['user_profile'];
		$is_pass_change = 0;
		// if(!preg_match($this->regular['realName'],$nickname)){
		// 	$this->response_data('0','请正确填写真实名称');
		// }
		if(!preg_match($this->regular['email'],$email)){
			$this->response_data('0','请正确填写邮箱');
		}
		if(!preg_match($this->regular['phone'],$mobile)){
			$this->response_data('0','请正确填写手机号码');
		}

		$u = $this->db->get_where('user',array(
			'mobile'=>$mobile,
			'id !='=>$this->uid
		))->row_array();
		if($u){
			$this->response_data('0','该手机号码已被注册');
		}
		if($password){
			$data['password'] = do_hash($password);
			$is_pass_change = 1;

		}
		$data = array(
			'email'=>$email,
			'nickname'=>$nickname,
			'mobile'=>$mobile,
			'sex'=>$sex,
			'user_profile'=>$user_profile,
			'photo'=>$photo
		);
		$this->db->update('user',$data,array('id'=>$this->uid));
		if($is_pass_change){
			$this->session->sess_destroy();
			setcookie(AUTH_COOKIE_NAME, ' ', time() - 31536000, '/');
		}
		$this->response_data('1','编辑成功');
	}
}
