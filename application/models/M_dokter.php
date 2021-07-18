<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model {

	public function getdokter($limit = null,$start = null)
	{
		return $this->db->get('dokter');
	}

	function simpan($data){
		$this->db->insert('dokter',$data); 
	}

	function hapus($id){
		$this->db->where('md5(kd_dokter)',$id);
		$this->db->delete('dokter');
	}

	function ubah($id){
		$this->db->where('md5(kd_dokter)',$id);
		return $this->db->get('dokter');
	}

	function ubah_simpan($id,$data){
		$this->db->where('kd_dokter',$id);
		return $this->db->update('dokter',$data);
	}

}
