<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Kategori');
		$this->load->helper(array('form','url'));
		$this->load->library('form_Validation');
		cek_belum_login();
		cek_pencatat();
	}


	public function index()
	{	
		$data['row']=$this->Model_Kategori->get();
		$this->template->load('template','kategori/index',$data);
	}

	public function create(){

		$this->template->load('template','kategori/create');
	}

	public function store()
	{

		$this->form_validation->set_rules('Nama', 'Nama Kategori', 'required|alpha',
			array('alpha'=> 'Nama harus diisi huruf tidak ada spasi.. !!!'));
		

		$this->form_validation->set_message('required','%s Harus diisi.. !!!');
	


		if ($this->form_validation->run() == FALSE)
                {
                        $this->template->load('template','kategori/create');
                }
                else
                {
                       $post=$this->input->post(null,TRUE);
                       $this->Model_Kategori->add($post);
                       if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('tambah','Data berhasil disimpan');
                       }
                       redirect('KategoriController');
                }
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('Nama', 'Nama Kategori', 'required|alpha',
			array('alpha'=> 'Nama harus diisi huruf tidak ada spasi.. !!!'));
		
		$this->form_validation->set_message('required','%s Harus diisi.. !!!');
	
		if ($this->form_validation->run() == FALSE)
                {
                		 $query = $this->Model_Kategori->get($id);
                		 if ($query->num_rows() > 0) {
                		 	$data['row']=$query->row();
                		 	$this->template->load('template','kategori/edit',$data);
                		 }else{
                		 	echo "<script>alert ('Data tidak ditemukan');";
                	 	echo "window.location='".site_url('KategoriController')."';</script>";
                		 }
                        
                }
                else
                {
                       $post=$this->input->post(null,TRUE);
                       $this->Model_Kategori->edit($post);
                       if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('edit','Data berhasil diubah');
                       }
                        redirect('KategoriController');

                }
		}

	public function delete(){
		$id=$this->input->post('Id');
		$this->Model_Kategori->del($id);
		 if($this->db->affected_rows() > 0){
          $this->session->set_flashdata('hapus','Data berhasil dihapus');
                       }
          redirect('KategoriController');
	}

		
}