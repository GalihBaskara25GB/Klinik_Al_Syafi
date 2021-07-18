<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tmp_detail_penjualan extends CI_Model {

	public function gettmp_detail_penjualan($limit = null,$start = null)
	{
		return $this->db->get('tmp_detail_penjualan');
	}

	function simpan($data){
		$this->db->insert('tmp_detail_penjualan',$data); 
	}

	function hapus($id){
		$this->db->where('md5(obat_tindakan)',$id);
		$this->db->delete('tmp_detail_penjualan');
	}

	function ubah($id){
		$this->db->where('md5(no_penjualan)',$id);
		return $this->db->get('tmp_detail_penjualan');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_penjualan',$id);
		return $this->db->update('tmp_detail_penjualan',$data);
	}

	function batal($id){
		$this->db->where('md5(no_penjualan)',$id);
		$this->db->delete('tmp_detail_penjualan');
	}

}
