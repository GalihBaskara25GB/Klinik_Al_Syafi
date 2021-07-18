<?php 

  $nama = "";
  $harga = "";

if($mode=="Edit"){
    foreach ($dt_tindakan->result() as $dt) { 
      $kdtindakan = $dt->kd_tindakan;
      $nama = $dt->nm_tindakan;
      $harga = $dt->harga;
    }
} else {
      $kdtindakan = $id;
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-tag"></i> <?php echo $mode?> Data Tindakan
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Tindakan/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

    <div class="form-group row">
      <label for="kdtindakan" class="col-md-2 col-sm-2 col-form-label">Kode Tindakan</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="kdtindakan" name="kdtindakan" value="<?php echo $kdtindakan ?>" readonly>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

  <div class="form-group row">
    <label for="nama" class="col-md-2 col-sm-2 col-form-label">Tindakan</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="harga" class="col-md-2 col-sm-2 col-form-label">Harga (Rp.)</label>
    <div class="col-md-3 col-sm-10">
      <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?php echo $harga ?>" min="0" required>
    </div>
  </div> 

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Tindakan" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>
