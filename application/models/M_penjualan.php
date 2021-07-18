<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function getpenjualan($limit = null,$start = null)
	{
		return $this->db->get('penjualan');
	}

	function simpan($data){
		$this->db->insert('penjualan',$data); 
	}

	function hapus($id){
		$this->db->where('md5(no_penjualan)',$id);
		$this->db->delete('penjualan');
	}

	function ubah($id){
		$this->db->where('md5(no_penjualan)',$id);
		return $this->db->get('penjualan');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_penjualan',$id);
		return $this->db->update('penjualan',$data);
	}

}
