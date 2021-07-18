<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_pasien');
	}

	public function index(){
		$menu['pasien_menu'] = 'active';
		$data['dt_pasien'] = $this->M_pasien->getpasien();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-wheelchair"></i> Data Pasien';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('pasien/pasien',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_pasien->hapus($id);
		redirect('Pasien');
	}

	public function tambah(){

		$qry =  $this->db->query("select * from pasien order by nomor_rm desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $no_rm  = substr($row['nomor_rm'], -4);
	          $no_rm = $no_rm+1;
	          if(strlen($no_rm)==1) $no_rm='000'.$no_rm;
	          else if(strlen($no_rm)==2) $no_rm='00'.$no_rm;
	          else if(strlen($no_rm)==3) $no_rm='0'.$no_rm;
	          else $no_rm=$no_rm;
	          $id=  'RM'.$no_rm;
	      } else {
	          $id=  'RM0001';
	      }


		$data['mode'] = 'Tambah';
		$data['id'] = $id;
		$menu['pasien_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-headphones"></i> Data Pasien';
  		$plugin['date_plugin'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('pasien/t_pasien',$data);
		$this->load->view('dashboard-footer',$plugin);

	}

	public function simpan(){

		$mode = $this->input->post('mode');

		$no_rm = $this->input->post('kd_desa').$this->input->post('no_kk').$this->input->post('no_rm');
		// die($no_rm);
        $data = array(
			'nomor_rm' => $no_rm,
			'no_bpjs' => $this->input->post('no_bpjs'),
			'nm_pasien' => $this->input->post('nama'),
			'no_identitas' => $this->input->post('nik'),
			'jns_kelamin' => $this->input->post('gender'),
			'gol_darah' => $this->input->post('gol_darah'),
			'agama' => $this->input->post('agama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'no_telepon' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'tanggal_rekam' => $this->input->post('tgl_rekam'),
			'kd_petugas' => $this->input->post('kd_petugas')
            );

        if($mode == 'Tambah'){
			$this->M_pasien->simpan($data);
		} else {
			$this->M_pasien->ubah_simpan($no_rm,$data);
		}
		redirect('Pasien');

	}

	public function edit($data){

		$edata['mode'] = 'Edit';
		$edata['dt_pasien'] = $this->M_pasien->ubah($data);
		$menu['pasien_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-wheelchair"></i> Data Pasien';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('pasien/t_pasien',$edata);
		$this->load->view('dashboard-footer');
	}

	public function detPasien($noRm){
		$data['dt_pasien'] = $this->M_pasien->ubah($noRm);

		$this->db->where('md5(nomor_rm)',$noRm);
		$data['dt_penyakit'] = $this->db->get('riwayat_penyakit');

		$menu['pasien_menu'] = 'active';
		$menu['title'] = '<i class="fas fa-wheelchair"></i> Data Pasien';
  		$plugin['tabel_plugin'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('pasien/det_pasien',$data);
		$this->load->view('dashboard-footer',$plugin);
	}
}
