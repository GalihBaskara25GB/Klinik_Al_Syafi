<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

	public function getobat($limit = null,$start = null)
	{
		return $this->db->get('obat');
	}

	function simpan($data){
		$this->db->insert('obat',$data); 
	}

	function hapus($id){
		$this->db->where('md5(kd_obat)',$id);
		$this->db->delete('obat');
	}

	function ubah($id){
		$this->db->where('md5(kd_obat)',$id);
		return $this->db->get('obat');
	}

	function ubah_simpan($id,$data){
		$this->db->where('kd_obat',$id);
		return $this->db->update('obat',$data);
	}

}
