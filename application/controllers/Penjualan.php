<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_penjualan');
		$this->load->model('M_tmp_detail_penjualan');
	}

	public function index(){
		$menu['penjualan_menu'] = 'active';
		$data['dt_penjualan'] = $this->M_penjualan->getpenjualan();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-shopping-cart"></i> Data Penjualan';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('penjualan/penjualan',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_penjualan->hapus($id);
		redirect('Penjualan');
	}

	public function delete_obat($id){
		$this->M_tmp_detail_penjualan->hapus($id);
		redirect('Penjualan/tambah');
	}

	public function tambah(){

		$menu['penjualan_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-shopping-cart"></i> Data Penjualan';

		$qry =  $this->db->query("select * from penjualan order by no_penjualan desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_penjualan   = substr($row['no_penjualan'],-8);
	          $kd_penjualan=$kd_penjualan+1;
	          if(strlen($kd_penjualan)==1) $kd_penjualan='0000000'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==2) $kd_penjualan='000000'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==3) $kd_penjualan='00000'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==4) $kd_penjualan='0000'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==5) $kd_penjualan='000'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==6) $kd_penjualan='00'.$kd_penjualan;
	          else if(strlen($kd_penjualan)==6) $kd_penjualan='0'.$kd_penjualan;
	          else $kd_penjualan=$kd_penjualan;
	          $id=  'PJ'.$kd_penjualan;
	      }
	      else {
	          $id=  'PJ00000001';
	      }

		$data['mode'] = 'Tambah';
		$data['id'] = $id;	      
  		$data['dt_obat'] = $this->db->query('select * from obat where stok > 0');
  		$plugin['date_plugin'] = 1;
  		$plugin['tabel_plugin'] = 1;
  		$data['dt_detail'] = $this->db->get('tmp_detail_penjualan where no_penjualan = \''.$id.'\'');

  		$plugin['javascript'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('penjualan/t_penjualan',$data);
		$this->load->view('penjualan/modal_obat',$data['dt_obat']);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function simpan(){       

		if (isset($_POST['tambah_obat'])) {
			$data = array(
				'no_penjualan' => $this->input->post('no_jual'),
				'obat' => $this->input->post('obat'),
				'harga' => $this->input->post('harga'),
	           	'jumlah' => $this->input->post('jumlah'),
	           	'subtotal' => (($this->input->post('jumlah'))*($this->input->post('harga')))
	            );

			$this->M_tmp_detail_penjualan->simpan($data);

			redirect('Penjualan/tambah');

		} else if(isset($_POST['simpan_transaksi'])){
	        $data = array(
				'no_penjualan' => $this->input->post('no_jual'),
				'tgl_penjualan' => $this->input->post('tgl_jual'),
				'total' => $this->input->post('hid_total'),
				'uang_bayar' => $this->input->post('uang_bayar'),
	           	'kd_petugas' => $this->input->post('kd_petugas')
	            );

			$this->M_penjualan->simpan($data);
			$no_jual = $this->input->post('no_jual');

			$this->session->set_flashdata('print_popup-jual',$no_jual);
			redirect('Penjualan');

		} else{
			redirect('Home');
		}
	}


	//BATAL
	public function batal($id){
		$this->M_tmp_detail_penjualan->batal($id);
		redirect('Penjualan');
	}

	public function nota($id = null){
		$dt = array('id' => $id);
		$this->load->view('penjualan/nota',$dt);
	}

	public function detPenjualan($noPenjualan){
		$data['dt_penjualan'] = $this->M_penjualan->ubah($noPenjualan);

		$this->db->where('md5(no_penjualan)',$noPenjualan);
		$data['dt_detail'] = $this->db->get('detail_penjualan');

		$menu['penjualan_menu'] = 'active';
		$menu['title'] = '<i class="fas fa-shopping-cart"></i> Data Penjualan';
  		$plugin['tabel_plugin'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('penjualan/det_penjualan',$data);
		$this->load->view('dashboard-footer',$plugin);
	}
}
