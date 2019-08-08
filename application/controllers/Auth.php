<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
		$this->load->library('form_Validation');
		
	}

	public function index()
	{
		cek_sudah_login();
		$this->load->view('login');
	}
	public function cek(){

		$post=$this->input->post(NULL, TRUE);
		if(isset($post['login'])) {
	
			$query = $this->Model_User->login($post); 
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params= array(
					'userid' => $row->id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat login berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			}else{
				echo "<script>
				alert('Maaf Username dan Password Tidak Cocok');
						window.location='".site_url('auth')."';
				</script>";
			}
		}
	}

	public function logout(){
		$params=array('userid','level');
		$this->session->unset_userdata($params);
		redirect('auth','refresh');
	}

	
}
