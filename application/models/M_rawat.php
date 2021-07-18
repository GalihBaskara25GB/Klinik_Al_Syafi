<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rawat extends CI_Model {

	public function getrawat($limit = null,$start = null)
	{
		return $this->db->get('rawat');
	}

	function simpan($data){
		$this->db->insert('rawat',$data); 
	}

	function hapus($id){
		$this->db->where('md5(no_rawat)',$id);
		$this->db->delete('rawat');
	}

	function ubah($id){
		$this->db->where('md5(no_rawat)',$id);
		return $this->db->get('rawat');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_rawat',$id);
		return $this->db->update('rawat',$data);
	}

}
