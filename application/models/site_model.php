<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_model extends Data_model{
	function __construct($table=''){
  		parent::__construct();
	}
	

	/**
	 * [getUserInfo description]
	 * @param  [type]  $parameter [username or userid]
	 * @param  boolean $isId      [isID]
	 * @return [type]             [userData]
	 */
	function getSiteInfo(){
		$this->table = 'site_config';
		return $this->getRow();
	}
	
}