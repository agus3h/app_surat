<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Keluar extends CI_Model {

	public function get($id = null){

		// $this->db->select('S_keluar.*,kategori.*, kategori.nama as kategori_nama');
		
		$this->db->from('s_keluar');
		$this->db->join('kategori','kategori.id = s_keluar.kategori_id');
		$this->db->order_by('id_keluar','desc');
		if ($id != null) {
			$this->db->where('id_keluar', $id);
		}
		$query = $this->db->get();

		return $query;
	}

	public function status($id = null){

		$this->db->select('*');
		$this->db->from('s_keluar');
		$this->db->join('kategori','kategori.id = s_keluar.kategori_id');
		$this->db->where('status','0');
		$this->db->order_by('id_keluar','desc');
		$query=$this->db->get();
		return $query;

	}

		public function add($post){
		$params=[
				'kepada'=>$post['surat_kepada'],
				'no_surat'=> $post['Nomor_Surat'],
				'perihal'=>$post['Perihal'],
				'kategori_id'=>$post['kategori_surat'],
				'catatan'=>$post['Catatan'],
				'status'=>$post['Status'],
				'image'=>$post['image']
				];
			
		$this->db->insert('s_keluar',$params);
	}

		public function edit($post){
		$params['no_surat']=$post['Nomor_Surat'];
		$params['perihal']=$post['Perihal'];
		$params['kepada']=$post['surat_kepada'];
		$params['catatan']=$post['Catatan'];
		$params['status']=$post['Status'];
		$params['kategori_id']=$post['kategori_surat'];
		$params['updated']=date('Y-m-d H:i:s');
		// $params['image'] = $post['image'];
		if ($post['image'] !=null) {
			$params['image'] = $post['image'];
		}

		$this->db->where('id_keluar',$post['Id']);
		$this->db->update('s_keluar',$params);
	}


	public function del($id){
		$this->db->where('id_keluar',$id);
		$this->db->delete('s_keluar');
	}

	
}

?>
