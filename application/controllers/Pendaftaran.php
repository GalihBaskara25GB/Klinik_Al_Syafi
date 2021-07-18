<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pendaftaran');
	}

	public function index(){
		$menu['pendaftaran_menu'] = 'active';
		$data['dt_pendaftaran'] = $this->M_pendaftaran->getpendaftaran();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-id-badge"></i> Data Pendaftaran';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('pendaftaran/pendaftaran',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_pendaftaran->hapus($id);
		redirect('Pendaftaran');
	}

	public function tambah(){

		$qry =  $this->db->query("select * from pendaftaran order by no_daftar desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_pendaftaran   = $row['no_daftar'];
	          $kd_pendaftaran=$kd_pendaftaran+1;
	          if(strlen($kd_pendaftaran)==1) $kd_pendaftaran='000000'.$kd_pendaftaran;
	          else if(strlen($kd_pendaftaran)==2) $kd_pendaftaran='00000'.$kd_pendaftaran;
	          else if(strlen($kd_pendaftaran)==3) $kd_pendaftaran='0000'.$kd_pendaftaran;
	          else if(strlen($kd_pendaftaran)==4) $kd_pendaftaran='000'.$kd_pendaftaran;
	          else if(strlen($kd_pendaftaran)==5) $kd_pendaftaran='00'.$kd_pendaftaran;
	          else if(strlen($kd_pendaftaran)==6) $kd_pendaftaran='0'.$kd_pendaftaran;
	          else $kd_pendaftaran=$kd_pendaftaran;
	          $id=  $kd_pendaftaran;
	      }
	      else {
	          $id=  '0000001';
	      }


		$data['mode'] = 'Tambah';
		$data['id'] = $id;
		$menu['pendaftaran_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-id-badge"></i> Data Pendaftaran';
  		
  		$data['dt_pasien'] = $this->db->get('pasien');
  		$data['dt_tindakan'] = $this->db->get('tindakan');
  		$plugin['date_plugin'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('pendaftaran/t_pendaftaran',$data);
		$this->load->view('pendaftaran/modal_rm',$data['dt_pasien']);
		$this->load->view('pendaftaran/modal_tindakan',$data['dt_tindakan']);
		$this->load->view('dashboard-footer',$plugin);

	}

	public function simpan(){

		$mode = $this->input->post('mode');        
		
		//mencari nomor antrian tertinggi
		$qry = $this->db->query('select nomor_antri from pendaftaran where tanggal_daftar = \''.$this->input->post('tgl_daftar').'\' order by nomor_antri desc limit 0,1');
		// $no_antri = $this->M_pendaftaran->top_antrian($this->input->post('tgl_daftar'));
		// die($qry->row_array()['nomor_antri']);

		if($qry->num_rows() > 0){
			$no_antri = $qry->row_array()['nomor_antri'];
			$no_antri = $no_antri + 1;
		} else $no_antri = 1;

        $data = array(
			'no_daftar' => $this->input->post('no_daftar'),
			'nomor_rm' => $this->input->post('no_rm'),
			'tanggal_daftar' => $this->input->post('tgl_daftar'),
			'keluhan' => $this->input->post('keluhan'),	
           	'nomor_antri' => $no_antri,
           	'status' => 'Belum',
           	'kd_petugas' => $this->input->post('kd_petugas')
            );

        if($mode == 'Tambah'){
			$this->M_pendaftaran->simpan($data);
		} else {
			$this->M_pendaftaran->ubah_simpan($this->input->post('no_daftar'),$data);
		}

		$no_daftar = $this->input->post('no_daftar');
		$this->session->set_flashdata('print_form-daftar',$no_daftar);

		redirect('Pendaftaran');

	}

	public function edit($data)
	{
		$edata['mode'] = 'Edit';
		$edata['dt_pendaftaran'] = $this->M_pendaftaran->ubah($data);
		$menu['pendaftaran_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-id-badge"></i> Data Pendaftaran';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('pendaftaran/t_pendaftaran',$edata);
		$this->load->view('dashboard-footer');
	}

	public function antrian_baru(){
		return $this->db->query('');
	}

	public function form_diagnosa($id = null){
		$dt = array('id' => $id);
		$this->load->view('pendaftaran/form_diagnosa',$dt);
	}

}
