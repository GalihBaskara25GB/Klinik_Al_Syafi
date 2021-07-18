<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tmp_detail_rawat extends CI_Model {

	public function gettmp_detail_rawat($limit = null,$start = null)
	{
		return $this->db->get('tmp_detail_rawat');
	}

	function simpan($data){
		$this->db->insert('tmp_detail_rawat',$data); 
	}

	function hapus($id){
		$this->db->where('md5(obat_tindakan)',$id);
		$this->db->delete('tmp_detail_rawat');
	}

	function ubah($id){
		$this->db->where('md5(no_rawat)',$id);
		return $this->db->get('tmp_detail_rawat');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_rawat',$id);
		return $this->db->update('tmp_detail_rawat',$data);
	}

	function batal($id){
		$this->db->where('md5(no_rawat)',$id);
		$this->db->delete('tmp_detail_rawat');
	}

}
