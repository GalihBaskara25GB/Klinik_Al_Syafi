<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tindakan extends CI_Model {

	public function gettindakan($limit = null,$start = null)
	{
		return $this->db->get('tindakan');
	}

	function simpan($data){
		$this->db->insert('tindakan',$data); 
	}

	function hapus($id){
		$this->db->where('md5(kd_tindakan)',$id);
		$this->db->delete('tindakan');
	}

	function ubah($id){
		$this->db->where('md5(kd_tindakan)',$id);
		return $this->db->get('tindakan');
	}

	function ubah_simpan($id,$data){
		$this->db->where('kd_tindakan',$id);
		return $this->db->update('tindakan',$data);
	}

}
