<?php
Class Fungsi{
	protected $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function user_login(){
		$this->ci->load->model('Model_User');
		$user_id= $this->ci->session->userdata('userid');
		$user_data=$this->ci->Model_User->get($user_id)->row();
		return $user_data;
	}
}

?>