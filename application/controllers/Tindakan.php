<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_tindakan');
	}

	public function index(){
		$menu['tindakan_menu'] = 'active';
		$data['dt_tindakan'] = $this->M_tindakan->gettindakan();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-tag"></i> Data Tindakan';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('tindakan/tindakan',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_tindakan->hapus($id);
		redirect('Tindakan');
	}

	public function tambah(){

		$qry =  $this->db->query("select * from tindakan order by kd_tindakan desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_tindakan   = substr($row['kd_tindakan'], -3);
	          $kd_tindakan=$kd_tindakan+1;
	          if(strlen($kd_tindakan)==1) $kd_tindakan='00'.$kd_tindakan;
	          else if(strlen($kd_tindakan)==2) $kd_tindakan='0'.$kd_tindakan;
	          else $kd_tindakan=$kd_tindakan;
	          $id=  'T'.$kd_tindakan;
	      }
	      else {
	          $id=  'T001';
	      }


		$data['mode'] = 'Tambah';
		$data['id'] = $id;
		$menu['tindakan_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-tag"></i> Data Tindakan';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('tindakan/t_tindakan',$data);
		$this->load->view('dashboard-footer');

	}

	public function simpan(){

		$mode = $this->input->post('mode');        

        $data = array(
			'kd_tindakan' => $this->input->post('kdtindakan'),
			'nm_tindakan' => $this->input->post('nama'),
			'harga' => $this->input->post('harga')
            );

        if($mode == 'Tambah'){
			$this->M_tindakan->simpan($data);
		} else {
			$this->M_tindakan->ubah_simpan($this->input->post('kdtindakan'),$data);
		}
		redirect('Tindakan');

	}

	public function edit($data)
	{
		$edata['mode'] = 'Edit';
		$edata['dt_tindakan'] = $this->M_tindakan->ubah($data);
		$menu['tindakan_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-tag"></i> Data Tindakan';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('tindakan/t_tindakan',$edata);
		$this->load->view('dashboard-footer');
	}

}
