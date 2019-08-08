<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Masuk extends CI_Model {

	public function get($id = null){
		// $this->db->select('S_masuk.*,kategori.*, kategori.nama as kategori_nama');
		$this->db->from('s_masuk');
		$this->db->join('kategori','kategori.id = s_masuk.kategori_id');
		$this->db->order_by('id_masuk','desc');
		if ($id != null) {
			$this->db->where('id_masuk', $id);

		}
		$query = $this->db->get();
		return $query;
	}

	public function status($id = null){

		$this->db->select('*');
		$this->db->from('s_masuk');
		$this->db->join('kategori','kategori.id = s_masuk.kategori_id');
		$this->db->where('status','0');
		$this->db->order_by('id_masuk','desc');
		$query=$this->db->get();
		return $query;

	}

		public function add($post){
		$params=[
				'dari'=>$post['surat_dari'],
				'no_surat'=> $post['Nomor_Surat'],
				'perihal'=>$post['Perihal'],
				'kategori_id'=>$post['kategori_surat'],
				'catatan'=>$post['Catatan'],
				'status'=>$post['Status'],
				'image'=>$post['image']
			
				];
		$this->db->insert('s_masuk',$params);
	}

		public function edit($post){
		$params['no_surat']=$post['Nomor_Surat'];
		$params['perihal']=$post['Perihal'];
		$params['dari']=$post['surat_dari'];
		$params['catatan']=$post['Catatan'];
		$params['status']=$post['Status'];
		$params['kategori_id']=$post['kategori_surat'];
		$params['updated']=date('Y-m-d H:i:s');

		if ($post['image'] !=null) {
			$params['image'] = $post['image'];
		}

		$this->db->where('id_masuk',$post['Id']);
		$this->db->update('s_masuk',$params);
	}


	public function del($id){
		$this->db->where('id_masuk',$id);
		$this->db->delete('s_masuk');
	}

	
}

?>
