<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

	public function getpasien($limit = null,$start = null)
	{
		return $this->db->get('pasien');
	}

	function simpan($data){
		$this->db->insert('pasien',$data); 
	}

	function hapus($id){
		$this->db->where('md5(nomor_rm)',$id);
		$this->db->delete('pasien');
	}

	function ubah($id){
		$this->db->where('md5(nomor_rm)',$id);
		return $this->db->get('pasien');
	}

	function ubah_simpan($id,$data){
		$this->db->where('nomor_rm',$id);
		return $this->db->update('pasien',$data);
	}

}
