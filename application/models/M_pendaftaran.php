<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftaran extends CI_Model {

	public function getpendaftaran($limit = null,$start = null)
	{
		return $this->db->get('pendaftaran');
	}

	function simpan($data){
		$this->db->insert('pendaftaran',$data); 
	}

	function hapus($id){
		$this->db->where('md5(no_daftar)',$id);
		$this->db->delete('pendaftaran');
	}

	function ubah($id){
		$this->db->where('md5(no_daftar)',$id);
		return $this->db->get('pendaftaran');
	}

	function ubah_simpan($id,$data){
		$this->db->where('no_daftar',$id);
		return $this->db->update('pendaftaran',$data);
	}

	function top_antrian($tgl){
		$this->db->query('select nomor_antri from pendaftaran where tanggal_daftar = \''.$tgl.'\' order by nomor_antri desc');
	}

}
