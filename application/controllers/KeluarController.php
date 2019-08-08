<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeluarController extends CI_Controller {
    

    public function __construct(){
      parent:: __construct();
      $this->load->model(['Model_Keluar','Model_Kategori']);
      cek_belum_login();
      
    }

    public function index()
    {
      $data["row"] = $this->Model_Keluar->get();

       if ($this->session->userdata('level') == 1) {
        $data['row']=$this->Model_Keluar->status();
        $this->template->load('template',"keluar/index_pencatat", $data);
      }else{
        
      $this->template->load('template',"keluar/index", $data);  
      }
    }

    public function add()
    {
      $keluar = new stdClass();
      $keluar->id_keluar = null ;
      $keluar->no_surat = null;
      $keluar->perihal = null;
      $keluar->kepada = null;
      $keluar->catatan = null;
      $keluar->kategori_id = null;
      $keluar->status = null;
      $keluar->image = null;
      $kategori=$this->Model_Kategori->get();

      $data = array(
              'page' => 'tambah',
              'row' =>$keluar,
              'kategori'=> $kategori,
            );


      if ($this->session->userdata('level') == 1) {  
        $this->template->load('template',"keluar/create_pencatat", $data);
      }else{

      $this->template->load('template','keluar/create',$data);    
    }
    }

    public function edit($id)
    {
     
      $query=$this->Model_Keluar->get($id);
      if($query->num_rows()>0){
        $keluar=$query->row();
        $kategori=$this->Model_Kategori->get();
        $data= array(
          'page'=>'edit',
          'row'=>$keluar ,
          'kategori'=> $kategori);

        // cek_pencatat();
      if ($this->session->userdata('level') == 1) {  
        $this->template->load('template',"keluar/create_pencatat", $data);
      }else if($this->session->userdata('level') != 1){

        $this->template->load('template','keluar/create',$data);

      }
      
      }else{
        redirect('KeluarController');
          }
      }

    public function process(){
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = 'surat-keluar'.date('ymd'.'-'.substr(md5(rand()),0,10));
      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      $post=$this->input->post(null,TRUE);


      
      if (isset($_POST['tambah'])) {

        if($_FILES['image']['name'] != null){
          if($this->upload->do_upload('image')){
            $post['image'] = $this->upload->data('file_name');
            $this->Model_Keluar->add($post);
            if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success','Data berhasil disimpan');
            }
            redirect('KeluarController');
          }else{
            //validate
            $error=$this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('KeluarController/add');
          }
        }else{
          $post['image'] = null;
          $this->Model_Keluar->add($post);
          if ($this->db->affected_rows()>0) {
          $this->session->set_flashdata('success','Data berhasil disimpan');
          }
          redirect('KeluarController');
        }

       

      } else if(isset($_POST['edit'])) {
        if($_FILES['image']['name'] != null){
          if($this->upload->do_upload('image')){

            // replace
            $image=$this->Model_Keluar->get($post['Id'])->row();
            if ($image->image != null) {
              $target_file='./uploads/'.$image->image;
              unlink($target_file);
            }

            $post['image'] = $this->upload->data('file_name');
            $this->Model_Keluar->edit($post);
            if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success','Data berhasil disimpan');
            }
            redirect('KeluarController');
          }else{
            $error=$this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('KeluarController/add');
          }
        }else{
          $post['image'] = null;
          $this->Model_Keluar->edit($post);
          if ($this->db->affected_rows()>0) {
          $this->session->set_flashdata('success','Data berhasil disimpan');
          }
          redirect('KeluarController');
        }

      }

    }


    public function del($id)
    {
      cek_pencatat();
      $image=$this->Model_Keluar->get($id)->row();
      if ($image->image != null) {
        $target_file='./uploads/'.$image->image;
        unlink($target_file);
      }

      $this->Model_Keluar->del($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('hapus','Data Berhasil Dihapus');
      }
      redirect('KeluarController');
    }

  }
?>