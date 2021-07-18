<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($lastNo=0){
		$menu['home_menu'] = 'active';
		$menu['title'] = '<i class="fas fa-home"></i> Home';
		$plugin['tabel_plugin'] = 1;
		$plugin['cek_panggil'] = 1;
		$data['dt_pendaftaran'] = $this->db->query('Select * from pendaftaran where status="Belum" and tanggal_daftar = Date(now()) order by nomor_antri asc');
		$data['dt_antri'] = $this->getNoAntri($lastNo);

		$this->load->view('dashboard-header',$menu);
		$this->load->view('dashboard',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function next(){
		if (isset($_POST['btn_skip'])) {
			redirect('Home/index/'.($this->input->post('no_antri')));
		} else if (isset($_POST['btn_next'])) {
			$this->check($this->input->post('no_antri'),$this->input->post('tgl'));
			redirect('Home/index/'.($this->input->post('no_antri')));
		}
	}

	private function getNoAntri($lastNo=0){
		$nextNo = $this->db->query('select pendaftaran.nomor_antri, pendaftaran.tanggal_daftar, pasien.nm_pasien from pendaftaran left join pasien on pendaftaran.nomor_rm = pasien.nomor_rm where pendaftaran.nomor_antri > '.$lastNo.' and pendaftaran.status="Belum" and pendaftaran.tanggal_daftar = Date(now())')->row_array();
		if(is_null($nextNo)){
			$nextNo = $this->db->query('select pendaftaran.nomor_antri,pendaftaran.tanggal_daftar, pasien.nm_pasien from pendaftaran left join pasien on pendaftaran.nomor_rm = pasien.nomor_rm where pendaftaran.status="Belum" and pendaftaran.tanggal_daftar = Date(now()) order by pendaftaran.nomor_antri asc limit 1')->row_array();
		}
		return $nextNo;
	}

	private function check($lastNo,$tgl){
		$this->db->query('Update pendaftaran set status="Sudah" where nomor_antri = '.$lastNo.' and tanggal_daftar = "'.$tgl.'"');
	}

}
