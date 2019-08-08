<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasukController extends CI_Controller {
    

    public function __construct(){
      parent:: __construct();
      $this->load->model(['Model_Masuk','Model_Kategori']);
      cek_belum_login();
      
    }

    public function index()
    {
      $data["row"] = $this->Model_Masuk->get();

      if ($this->session->userdata('level') == 1) {
        $data['row']=$this->Model_Masuk->status();
        $this->template->load('template',"masuk/index_pencatat", $data);
      }else{
      $this->template->load('template',"masuk/index", $data);  
      }

      
    }

    public function add()
    {
      $masuk = new stdClass();
      $masuk->id_masuk = null ;
      $masuk->no_surat = null;
      $masuk->perihal = null;
      $masuk->dari = null;
      $masuk->catatan = null;
      $masuk->kategori_id = null;
      $masuk->status = null;
      $kategori=$this->Model_Kategori->get();

      $data = array(
              'page' => 'tambah',
              'row' =>$masuk,
              'kategori'=> $kategori,
            );
      

      if ($this->session->userdata('level') == 1) {  
        $this->template->load('template',"masuk/create_pencatat", $data);
      }else{

     $this->template->load('template','masuk/create',$data);     
    }
    }

    public function edit($id)
    {
     // cek_pencatat();
      $query=$this->Model_Masuk->get($id);
      if($query->num_rows()>0){
        $masuk=$query->row();
        $kategori=$this->Model_Kategori->get();
        $data= array(
          'page'=>'edit',
          'row'=>$masuk ,
          'kategori'=> $kategori);

         if ($this->session->userdata('level') == 1) {  
        $this->template->load('template',"masuk/create_pencatat", $data);
      }else if($this->session->userdata('level') != 1){

        $this->template->load('template','masuk/create',$data);

          }
      }else{
          redirect('MasukController');
        }
      }


    public function process(){
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = 'surat-masuk'.date('ymd'.'-'.substr(md5(rand()),0,10));
      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      $post=$this->input->post(null,TRUE);
      if (isset($_POST['tambah'])) {

        if($_FILES['image']['name'] != null){
          if($this->upload->do_upload('image')){
            $post['image'] = $this->upload->data('file_name');
            $this->Model_Masuk->add($post);
            if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success','Data berhasil disimpan');
            }
            redirect('MasukController');
          }else{
            $error=$this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('MasukController/add');
          }
        }else{
          $post['image'] = null;
          $this->Model_Masuk->add($post);
          if ($this->db->affected_rows()>0) {
          $this->session->set_flashdata('success','Data berhasil disimpan');
          }
          redirect('MasukController');
        }

       

      } else if(isset($_POST['edit'])) {
        if($_FILES['image']['name'] != null){
          if($this->upload->do_upload('image')){

            // replace
            $image=$this->Model_Masuk->get($post['Id'])->row();
            if ($image->image != null) {
              $target_file='./uploads/'.$image->image;
              unlink($target_file);
            }

            $post['image'] = $this->upload->data('file_name');
            $this->Model_Masuk->edit($post);
            if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('success','Data berhasil disimpan');
            }
            redirect('MasukController');
          }else{
            $error=$this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('MasukController/add');
          }
        }else{
          $post['image'] = null;
          $this->Model_Masuk->edit($post);
          if ($this->db->affected_rows()>0) {
          $this->session->set_flashdata('success','Data berhasil disimpan');
          }
          redirect('MasukController');
        }

      }

    }
    


    public function del($id)
    {
      cek_pencatat();
      $image=$this->Model_Masuk->get($id)->row();
      if ($image->image != null) {
        $target_file='./uploads/'.$image->image;
        unlink($target_file);
      }
      $this->Model_Masuk->del($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('hapus','Data Berhasil Dihapus');
      }
      redirect('MasukController');
    }

  }
?>