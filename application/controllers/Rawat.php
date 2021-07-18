<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawat extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_rawat');
		$this->load->model('M_tmp_detail_rawat');
	}

	public function index(){
		$menu['rawat_menu'] = 'active';
		$data['dt_rawat'] = $this->M_rawat->getrawat();
		$plugin['tabel_plugin'] = 1;
		$menu['title'] = '<i class="fas fa-ambulance"></i> Data Rawat';

		$this->load->view('dashboard-header',$menu,$plugin);
		$this->load->view('rawat/rawat',$data);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function delete($id){
		$this->M_rawat->hapus($id);
		redirect('Rawat');
	}

	public function delete_obat($id){
		$this->M_tmp_detail_rawat->hapus($id);
		redirect('Rawat/tambah');
	}

	public function tambah(){

		$menu['rawat_menu'] = 'active';
  		$menu['title'] = '<i class="fas fa-ambulance"></i> Data Rawat';

		$qry =  $this->db->query("select * from rawat order by no_rawat desc");
		// die($qry);
	      if($qry->num_rows() > 0){
	          $row    =  $qry->row_array();
	          $kd_rawat   = substr($row['no_rawat'], -8);
	          $kd_rawat=$kd_rawat+1;
	          if(strlen($kd_rawat)==1) $kd_rawat='0000000'.$kd_rawat;
	          else if(strlen($kd_rawat)==2) $kd_rawat='000000'.$kd_rawat;
	          else if(strlen($kd_rawat)==3) $kd_rawat='00000'.$kd_rawat;
	          else if(strlen($kd_rawat)==4) $kd_rawat='0000'.$kd_rawat;
	          else if(strlen($kd_rawat)==5) $kd_rawat='000'.$kd_rawat;
	          else if(strlen($kd_rawat)==6) $kd_rawat='00'.$kd_rawat;
	          else if(strlen($kd_rawat)==6) $kd_rawat='0'.$kd_rawat;
	          else $kd_rawat=$kd_rawat;
	          $id=  'RW'.$kd_rawat;
	      }
	      else {
	          $id=  'RW00000001';
	      }

		$data['mode'] = 'Tambah';
		$data['id'] = $id;	      
  		$data['dt_obat'] = $this->db->query('select * from obat where stok > 0');
  		$data['dt_tindakan'] = $this->db->query('select * from tindakan');
  		$data['dt_penyakit'] = $this->db->query('select * from penyakit');
  		$data['dt_pendaftaran'] = $this->db->query('select * from pendaftaran where status="Sudah" order by tanggal_daftar desc');
  		$plugin['date_plugin'] = 1;
  		$plugin['tabel_plugin'] = 1;
  		$data['dt_detail'] = $this->db->get('tmp_detail_rawat where no_rawat = \''.$id.'\'');

  		$plugin['javascript'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('rawat/t_rawat',$data);
		$this->load->view('rawat/modal_pendaftaran',$data['dt_pendaftaran']);
		$this->load->view('rawat/modal_tindakan',$data['dt_tindakan']);
		$this->load->view('rawat/modal_penyakit',$data['dt_penyakit']);
		$this->load->view('rawat/modal_obat',$data['dt_obat']);
		$this->load->view('dashboard-footer',$plugin);
	}

	public function simpan(){       

		if (isset($_POST['tambah_obat'])) {
			$data = array(
				'no_rawat' => $this->input->post('no_rawat'),
				'obat_tindakan' => $this->input->post('obat_tindakan'),
				'harga' => $this->input->post('harga'),
	           	'jumlah' => $this->input->post('jumlah'),
	           	'subtotal' => (($this->input->post('jumlah'))*($this->input->post('harga')))
	            );

			$this->M_tmp_detail_rawat->simpan($data);

			//Melewatkan array data sehingga diagnosa, norm, tgl rawat yang tadi bisa ditampilkan
			$dt_input = array(
						'diagnosa' => $this->input->post('diagnosa'),
						'no_daftar' => $this->input->post('no_daftar'),
						'tgl_rawat' => $this->input->post('tgl_rawat'),
						'tgl_keluar' => $this->input->post('tgl_keluar'),
						'keterangan' => $this->input->post('keterangan'),
						'jns_rawat' => $this->input->post('jns_rawat'),
						'kode_penyakit' => $this->input->post('kode_penyakit')
					);

			$this->session->set_flashdata('dt_input',$dt_input);
			redirect('Rawat/tambah');

		} else if(isset($_POST['simpan_transaksi'])){
	        $data = array(
				'no_rawat' => $this->input->post('no_rawat'),
				'no_daftar' => $this->input->post('no_daftar'),
				'tgl_rawat' => $this->input->post('tgl_rawat'),
				'tgl_keluar' => $this->input->post('tgl_keluar'),
				'diagnosa' => $this->input->post('diagnosa'),
				'code_icd_x' => $this->input->post('kode_penyakit'), 
				'total' => $this->input->post('hid_total'),
				'uang_bayar' => $this->input->post('uang_bayar'),
				'keterangan' => $this->input->post('keterangan'),
	           	'kd_petugas' => $this->input->post('kd_petugas'),
	           	'jenis_rawat' => $this->input->post('jns_rawat')
	            );

			$this->M_rawat->simpan($data);
			$no_rawat = $this->input->post('no_rawat');

			$this->session->set_flashdata('print_popup-rawat',$no_rawat);
			redirect('Rawat');

		} else{
			redirect('Home');
		}
	}

	//BATAL
	public function batal($id){
		$this->M_tmp_detail_rawat->batal($id);
		redirect('Rawat');
	}

	public function nota($id = null){
		$dt = array('id' => $id);
		$this->load->view('rawat/nota',$dt);
	}

	public function detRawat($noRawat){
		$data['dt_rawat'] = $this->M_rawat->ubah($noRawat);

		$this->db->where('md5(no_rawat)',$noRawat);
		$data['dt_detail'] = $this->db->get('detail_rawat');

		$menu['rawat_menu'] = 'active';
		$menu['title'] = '<i class="fas fa-ambulance"></i> Data Rawat';
  		$plugin['tabel_plugin'] = 1;

		$this->load->view('dashboard-header',$menu);
		$this->load->view('rawat/det_rawat',$data);
		$this->load->view('dashboard-footer',$plugin);
	}
	
}
