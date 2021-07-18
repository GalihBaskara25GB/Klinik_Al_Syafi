<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_dokter');
	}

	public function index(){
		$menu['dokter_menu'] = 'active';
		$data['dt_dokter'] = $this->M_dokter->getdokter();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-headphones"></i> Data Dokter';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('dokter/dokter',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_dokter->hapus($id);
		redirect('Dokter');
	}

	public function tambah(){

		$qry =  $this->db->query("select * from dokter order by kd_dokter desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_dokter   = substr($row['kd_dokter'], -3);
	          $kd_dokter=$kd_dokter+1;
	          if(strlen($kd_dokter)==1) $kd_dokter='00'.$kd_dokter;
	          else if(strlen($kd_dokter)==2) $kd_dokter='0'.$kd_dokter;
	          else $kd_dokter=$kd_dokter;
	          $id=  'DT'.$kd_dokter;
	      }
	      else {
	          $id=  'DT001';
	      }


		$data['mode'] = 'Tambah';
		$data['id'] = $id;
		$menu['dokter_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-headphones"></i> Data Dokter';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('dokter/t_dokter',$data);
		$this->load->view('dashboard-footer');

	}

	public function simpan(){

		$mode = $this->input->post('mode');

        $data = array(
			'kd_dokter' => $this->input->post('kddokter'),
			'nm_dokter' => $this->input->post('nama'),
			'jns_kelamin' => $this->input->post('gender'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => $this->input->post('alamat'),
			'no_telepon' => $this->input->post('telp'),
			'sip' => $this->input->post('sip'),
			'spesialisasi' => $this->input->post('spesialisasi')
            );

        if($mode == 'Tambah'){
			$this->M_dokter->simpan($data);
		} else {
			$this->M_dokter->ubah_simpan($this->input->post('kddokter'),$data);
		}
		redirect('Dokter');

	}

	public function edit($data){

		$edata['mode'] = 'Edit';
		$edata['dt_dokter'] = $this->M_dokter->ubah($data);
		$menu['dokter_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-headphones"></i> Data Dokter';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('dokter/t_dokter',$edata);
		$this->load->view('dashboard-footer');
	}

}
