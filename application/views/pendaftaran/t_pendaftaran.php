<?php 

  $no_rm = "";
  $tgl_daftar = "";
  $keluhan = "";
  $kd_petugas = $this->session->userdata('kd_petugas');

if($mode=="Edit"){
    foreach ($dt_pendaftaran->result() as $dt) {
      $no_daftar = $dt->no_daftar; 
      $no_rm = $dt->nomor_rm;
      $tgl_daftar = $dt->tanggal_daftar;
      $keluhan = $dt->keluhan;
      $kd_petugas = $dt->kd_petugas;
     }
} else {
      $no_daftar = $id;
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-id-badge"></i> <?php echo $mode?> Data Pendaftaran
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Pendaftaran/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

    <div class="form-group row">
      <label for="no_daftar" class="col-md-2 col-sm-2 col-form-label">No Pendaftaran</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="no_daftar" name="no_daftar" value="<?php echo $no_daftar ?>" readonly>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

  <div class="form-group row">
    <label for="no_rm" class="col-md-2 col-sm-2 col-form-label">Rekam Medis</label>
    <div class="row col-md-6 col-sm-10">
      <div class="col-md-5 col-sm-7" style="padding-right: 0">
        <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="No Rekam Medis" value="<?php echo $no_rm ?>" required>
      </div>
      <div class="col-md-1 col-sm-3" style="padding-left: 5px">
        <button type="button" class="btn" data-toggle="modal" data-target="#modal_rm">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="keluhan" class="col-md-2 col-sm-2 col-form-label">Keluhan</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan" value="<?php echo $keluhan ?>" maxlength="100" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="tgl_daftar" class="col-md-2 col-sm-2 col-form-label">Tanggal Daftar</label>
    <div class="col-md-3 col-sm-10">
      <input type="date" class="form-control" id="tgl_now" name="tgl_daftar" value="<?php echo $tgl_daftar?>"required>
    </div>
  </div>

  <div class="form-group row">
    <label for="kd_petugas" class="col-md-2 col-sm-2 col-form-label">ID Petugas</label>
    <div class="col-md-3 col-sm-10">
      <input type="text" class="form-control" id="kd_petugas" name="kd_petugas" value="<?php echo $kd_petugas ?>" maxlength="100" required readonly>
    </div>
  </div>

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Pendaftaran" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>