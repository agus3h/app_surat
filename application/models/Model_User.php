<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model {

	public function login($post){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null){
		$this->db->from('user');
		if ($id != null) {
			$this->db->where('id', $id);

		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post){
		$params['username']=$post['Username'];
		$params['name']=$post['Nama'];
		$params['password']=sha1($post['Password']);
		$params['level']=$post['Level'];
		$this->db->insert('user',$params);
	}


	public function edit($post){
		$params['username']=$post['Username'];
		$params['name']=$post['Nama'];
		$params['password']=sha1($post['Password']);
		$params['level']=$post['Level'];
		$this->db->where('id',$post['Id']);
		$this->db->update('user',$params);
	}

	public function del($id){
		$this->db->where('id',$id);
		$this->db->delete('user');
	}
}
