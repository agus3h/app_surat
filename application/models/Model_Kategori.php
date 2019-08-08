<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Kategori extends CI_Model {

// 	public function getAll(){
// 	return $this->db->get('kategori')->result();
// }
	public function get($id = null){
		$this->db->from('kategori');
		if ($id != null) {
			$this->db->where('id', $id);

		}
		$query = $this->db->get();
		return $query;
	}


		public function add($post){
		$params['nama']=$post['Nama'];
		$this->db->insert('kategori',$params);
	}

		public function edit($post){
		$params['nama']=$post['Nama'];
		$this->db->where('id',$post['Id']);
		$this->db->update('kategori',$params);
	}


	public function del($id){
		$this->db->where('id',$id);
		$this->db->delete('kategori');
	}

	
}
