<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_obat');
	}

	public function index(){
		$menu['obat_menu'] = 'active';
		$data['dt_obat'] = $this->M_obat->getobat();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-circle"></i> Data Obat';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('obat/obat',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_obat->hapus($id);
		redirect('Obat');
	}

	public function tambah(){

		$qry =  $this->db->query("select * from obat order by kd_obat desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_obat   = substr($row['kd_obat'], -4);
	          $kd_obat=$kd_obat+1;
	          if(strlen($kd_obat)==1) $kd_obat='000'.$kd_obat;
	          else if(strlen($kd_obat)==2) $kd_obat='00'.$kd_obat;
	          else if(strlen($kd_obat)==3) $kd_obat='0'.$kd_obat;
	          else $kd_obat=$kd_obat;
	          $id=  'H'.$kd_obat;
	      }
	      else {
	          $id=  'H0001';
	      }


		$data['mode'] = 'Tambah';
		$data['id'] = $id;
		$menu['obat_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-circle"></i> Data Obat';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('obat/t_obat',$data);
		$this->load->view('dashboard-footer');

	}

	public function simpan(){

		$mode = $this->input->post('mode');        

        $data = array(
			'kd_obat' => $this->input->post('kdobat'),
			'nm_obat' => $this->input->post('nama'),
			'harga_modal' => $this->input->post('harga_modal'),
			'harga_jual' => $this->input->post('harga_jual'),
			'stok' => $this->input->post('stok'),		
           	'keterangan' => $this->input->post('keterangan')
            );

        if($mode == 'Tambah'){
			$this->M_obat->simpan($data);
		} else {
			$this->M_obat->ubah_simpan($this->input->post('kdobat'),$data);
		}
		redirect('Obat');

	}

	public function edit($data)
	{
		$edata['mode'] = 'Edit';
		$edata['dt_obat'] = $this->M_obat->ubah($data);
		$menu['obat_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-circle"></i> Data Obat';
  		
		$this->load->view('dashboard-header',$menu);
		$this->load->view('obat/t_obat',$edata);
		$this->load->view('dashboard-footer');
	}

}
