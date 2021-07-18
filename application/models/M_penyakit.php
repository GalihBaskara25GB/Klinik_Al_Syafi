<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyakit extends CI_Model {

	public function getpenyakit($limit = null,$start = null)
	{
		return $this->db->get('penyakit');
	}

	function simpan($data){
		$this->db->insert('penyakit',$data); 
	}

	function hapus($id){
		$this->db->where('md5(code_icd_x)',$id);
		$this->db->delete('penyakit');
	}

	function ubah($id){
		$this->db->where('md5(code_icd_x)',$id);
		return $this->db->get('penyakit');
	}

	function ubah_simpan($id,$data){
		$this->db->where('code_icd_x',$id);
		return $this->db->update('penyakit',$data);
	}

}
