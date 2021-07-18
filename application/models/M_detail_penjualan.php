<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_penjualan extends CI_Model {

	public function getdetail_penjualan($limit = null,$start = null)
	{
		return $this->db->get('detail_penjualan');
	}

	function simpan($data){
		$this->db->insert('detail_penjualan',$data); 
	}

	function hapus($id){
		$this->db->where('md5(obat_tindakan)',$id);
		$this->db->delete('detail_penjualan');
	}

	function ubah($id){
		$this->db->where('md5(no_penjualan)',$id);
		return $this->db->get('detail_penjualan');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_penjualan',$id);
		return $this->db->update('detail_penjualan',$data);
	}

	function batal($id){
		$this->db->where('md5(no_penjualan)',$id);
		$this->db->delete('detail_penjualan');
	}

}
