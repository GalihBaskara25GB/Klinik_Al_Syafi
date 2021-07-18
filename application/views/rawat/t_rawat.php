<?php 

  if($this->session->flashdata('dt_input')){
    //Melakukan cek apakah tambah ke1 atau tidak

    $diagnosa = $this->session->flashdata('dt_input')['diagnosa'];
    $tgl_keluar = $this->session->flashdata('dt_input')['tgl_keluar'];
    $tgl_rawat = $this->session->flashdata('dt_input')['tgl_rawat'];
    $no_daftar = $this->session->flashdata('dt_input')['no_daftar'];
    $keterangan = $this->session->flashdata('dt_input')['keterangan'];
    $jns_rawat = $this->session->flashdata('dt_input')['jns_rawat'];
    $kd_penyakit = $this->session->flashdata('dt_input')['kode_penyakit'];
  } else {
    $diagnosa = "";
    $no_daftar = "";
    $tgl_rawat = "";
    $tgl_keluar = "";
    $keterangan = "";
    $rbjalan = ""; 
    $rbinap = "";
    $jns_rawat = "";
    $kd_penyakit = "";
  }

  $uang_bayar = "";
  $kd_petugas = $this->session->userdata('kd_petugas');
  $no_rawat = $id;
  
?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-ambulance"></i> Rawat
    </center>
  </h3>
</div>

<div class="row col-md-12">

<div class="col-md-6">
  <form clas="row" action="<?php echo base_url() ?>Rawat/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

      <div class="form-group row">
        <label for="no_rawat" class="col-md-4 col-sm-2 col-form-label">No Rawat</label>
        <div class="col-md-8 col-sm-10">
          <input type="text" class="form-control" id="no_rawat" name="no_rawat" value="<?php echo $no_rawat ?>" readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="kd_petugas" class="col-md-4 col-sm-2 col-form-label">Jenis Rawat</label>
        <div class="col-md-8 col-sm-10">
          <input type="hidden" class="form-control" id="kd_petugas" name="kd_petugas" value="<?php echo $kd_petugas ?>" required readonly>
          <div class="radio">
              <input name="jns_rawat" type="radio" id="rbjalan" value="Jalan" <?php if($jns_rawat == 'Jalan') echo 'Checked';?> required onclick="document.getElementById('tgl_rawat').value = document.getElementById('tgl_now').value;"/>&nbsp;<label for="rbjalan">Rawat Jalan</label>&emsp;&emsp;
              <input name="jns_rawat" type="radio" id="rbinap" value="Inap" <?php if($jns_rawat == 'Inap') echo 'Checked';?> required/>&nbsp;<label for="rbinap">Rawat Inap</label>
          </div>
        </div>
      </div>

    <div class="form-group row">
      <label for="diagnosa" class="col-md-4 col-sm-2 col-form-label">Diagnosa</label>
      <div class="col-md-8 col-sm-10">
        <textarea cols="38" rows="4" name="diagnosa" id="diagnosa" required><?php echo $diagnosa ?></textarea>
      </div>
    </div>
   
    <div class="form-group row">
      <label for="kode_penyakit" class="col-md-4 col-sm-2 col-form-label">Kode Penyakit</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" value="<?php echo $kd_penyakit ?>" placeholder="Kode Penyakit" required readonly>
      </div>
      <div class="col-md-1 col-sm-3" style="padding-left: 0px; margin-left: 0">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_penyakit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>

</div>

<div class="col-md-6"> 

    <div class="form-group row">
      <label for="no_daftar" class="col-md-4 col-sm-2 col-form-label">No Pendaftaran</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="no_daftar" name="no_daftar" value="<?php echo $no_daftar ?>"  placeholder="No Pendaftaran" required readonly>
      </div>
      <div class="col-md-1 col-sm-3" style="padding-left: 0px; margin-left: 0">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_pendaftaran">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>

    <div class="form-group row">
      <label for="tgl_rawat" class="col-md-4 col-sm-2 col-form-label">Tanggal Masuk</label>
      <div class="col-md-8 col-sm-10">
        <input type="date" class="form-control" id="tgl_rawat" name="tgl_rawat" value="<?php echo $tgl_rawat ?>"required readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="tgl_keluar" class="col-md-4 col-sm-2 col-form-label">Tanggal Keluar</label>
      <div class="col-md-8 col-sm-10">
        <input type="date" class="form-control" id="tgl_now" name="tgl_keluar" value="<?php echo $tgl_keluar ?>" required readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="Keterangan" class="col-md-4 col-sm-2 col-form-label">Keterangan</label>
      <div class="col-md-8 col-sm-10">
        <!-- <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $keterangan ?>" required> -->
        <textarea cols="38" rows="4" name="keterangan" id="keterangan" required><?php echo $diagnosa ?></textarea>
      </div>
    </div>

</div>

  <div class="col-md-4">
    <br>
    <div class="form-group row">
      <label for="obat_tindakan" class="col-md-3 col-sm-2 col-form-label">Obat / Tindakan</label>
      <div class="col-md-9 col-sm-10">
        <input type="text" class="form-control" id="obat_tindakan" name="obat_tindakan" placeholder="Obat/Tindakan" required readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="jumlah" class="col-md-3 col-sm-2 col-form-label"></label>
      <div class="col-md-4 col-sm-3">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_obat">
          <i class="fas fa-search"></i> Obat 
        </button>
      </div>
      <div class="col-md-4 col-sm-3">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal_tindakan">
          <i class="fas fa-search"></i> Tindakan
        </button>
      </div>
    </div>

    <div class="form-group row">
      <label for="jumlah" class="col-md-3 col-sm-2 col-form-label">Jumlah</label>
      <div class="col-md-9 col-sm-10">
        <input type="number" class="form-control" id="jumlah" name="jumlah" min="0" required value="1"></input>
        <input type="hidden" id="harga" name="harga"></input>
      </div>
    </div>

    <button type="submit" class="btn btn-primary col-md-12" name="tambah_obat">
      <i class="fa fa-plus"></i> Tambah
    </button>
    
  </div>

  <div class="col-md-8" style="padding: 0 0 0 10px; font-size: 14px">
    
    <br>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Obat/Tindakan</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Opsi</th>
      </thead>
      <tbody>
      <?php
      $no=0; $gr_jml=0; $gr_total=0; 
      foreach ($dt_detail->result() as $data){
            $no=$no+1; $gr_jml=$gr_jml+$data->jumlah; $gr_total=$gr_total+$data->subtotal;

            echo '
            <tr>
            <td>'.$no.'</td>
            <td>'.$data->obat_tindakan.'</td>
            <td>Rp. '.$data->harga.'</td>
            <td>'.$data->jumlah.'</td>
            <td>Rp. '.$data->subtotal.'</td>
                <td>
                    <a class="btn btn-outline-dark btn-sm" href="delete_obat/'.md5($data->obat_tindakan).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>';
     } ?>
        <tr>
          <td colspan="3">Grand Total</td>
          <td><?php echo $gr_jml ?></td>
          <td>Rp. <?php echo $gr_total ?></td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <div class="form-group row">
      <label for="uang_bayar" class="col-md-4 col-sm-2 col-form-label">Uang Bayar</label>
      <div class="col-md-8 col-sm-10">
        <input type="hidden" id="hid_total" name="hid_total" value="<?php echo $gr_total ?>">
        <input type="number" class="form-control" id="uang_bayar" name="uang_bayar" placeholder="Uang Bayar" min="0" value="<?php echo $gr_total ?>" required></input>
      </div>
    </div>

    <div class="form-group row">
      <label for="kembalian" class="col-md-4 col-sm-2 col-form-label">Kembalian</label>
      <div class="col-md-8 col-sm-10">
        <input type="number" class="form-control" id="kembalian" name="kembalian" min="0"value="0" placeholder="Kembalian" readonly></input>
      </div>
    </div>  

  </div>

    <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

      <div class="btni" style="float: right;">
        <button type="submit" class="btn btn-outline-primary" name="simpan_transaksi">
          <i class="fa fa-check"></i> Simpan
        </button>
        
        <a role="button" class="btn btn-danger btn-batal" href="<?php echo 'batal/'.md5($id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
          Batal
        </a>
      </div>
    </div>
  </form>

</div>