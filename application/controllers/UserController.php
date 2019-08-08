<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_User');
		$this->load->library('form_Validation');
		cek_belum_login();
		cek_admin();

	}

	public function index()
	{	
		
		$data['row'] = $this->Model_User->get();
		$this->template->load('template','user/index',$data);
	}

	public function create(){
		
		$this->template->load('template','user/create');
	}

	public function store(){
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		$this->form_validation->set_rules('Nama', 'Nama', 'required|alpha',
			array('alpha'=> 'Nama harus diisi huruf tidak ada spasi.. !!!'));
		$this->form_validation->set_rules('Level', 'Level', 'required');

		$this->form_validation->set_message('required','%s Harus diisi.. !!!');
	


		if ($this->form_validation->run() == FALSE)
                {
                        $this->template->load('template','user/create');
                }
                else
                {
                       $post=$this->input->post(null,TRUE);
                       $this->Model_User->add($post);
                       if($this->db->affected_rows() > 0){
                       	echo "<script>alert ('Data berhasil disimpan');</script>";
                       }
                       echo "<script>window.location='".site_url('UserController')."';</script>";
                }
	}



	public function edit($id){
		$this->form_validation->set_rules('Username', 'Username', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
		$this->form_validation->set_rules('Nama', 'Nama', 'required|alpha',
			array('alpha'=> 'Nama harus diisi huruf tidak ada spasi.. !!!'));
		$this->form_validation->set_rules('Level', 'Level', 'required');

		$this->form_validation->set_message('required','%s Harus diisi.. !!!');
	


		if ($this->form_validation->run() == FALSE)
                {
          
                $query = $this->Model_User->get($id);
                if ($query->num_rows() > 0) {
                	$data['row']=$query->row();
                	 $this->template->load('template','user/edit',$data);
                }else{
                	 	echo "<script>alert ('Data tidak ditemukan');";
                	 	echo "window.location='".site_url('UserController')."';</script>";
                }
                       
                }
                else
                {

                	$post=$this->input->post(null,TRUE);
                	$this->Model_User->edit($post);
                       if($this->db->affected_rows() > 0){
                       	echo "<script>alert ('Data berhasil diubah');</script>";
                       }
                       echo "<script>window.location='".site_url('UserController')."';</script>";
                }
	}
	

	public function delete(){
		$id=$this->input->post('Id');
		$this->Model_User->del($id);
		 if($this->db->affected_rows() > 0){
                       	echo "<script>alert ('Data berhasil dihapus');</script>";
                       }
                       echo "<script>window.location='".site_url('UserController')."';</script>";
	}

}
