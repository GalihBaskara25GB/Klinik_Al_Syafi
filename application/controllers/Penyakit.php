<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_penyakit');
	}

	public function index(){
		$menu['penyakit_menu'] = 'active';
		$data['dt_penyakit'] = $this->M_penyakit->getpenyakit();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-heartbeat"></i> Data Penyakit';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('penyakit/penyakit',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_penyakit->hapus($id);
		redirect('Penyakit');
	}

	public function tambah(){

		$data['mode'] = 'Tambah';
		$menu['penyakit_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-heartbeat"></i> Data Penyakit';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('penyakit/t_penyakit',$data);
		$this->load->view('dashboard-footer');

	}

	public function simpan(){

		$mode = $this->input->post('mode');        

        $data = array(
			'kelompok_penyakit' => $this->input->post('kel'),
			'code_icd_x' => $this->input->post('kdpenyakit'),
			'diagnosa' => $this->input->post('diagnosa'),
			'diagnosis' => $this->input->post('diagnosis')
            );

        if($mode == 'Tambah'){
			$this->M_penyakit->simpan($data);
		} else {
			$this->M_penyakit->ubah_simpan($this->input->post('kdpenyakit'),$data);
		}
		redirect('Penyakit');

	}

	public function edit($data)
	{
		$edata['mode'] = 'Edit';
		$edata['dt_penyakit'] = $this->M_penyakit->ubah($data);
		$menu['penyakit_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-heartbeat"></i> Data Penyakit';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('penyakit/t_penyakit',$edata);
		$this->load->view('dashboard-footer');
	}

}
