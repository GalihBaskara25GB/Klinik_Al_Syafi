<?php 

  $nama = "";
  $harga_modal = "";
  $harga_jual = "";
  $stok = "";
  $keterangan = "";

if($mode=="Edit"){
    foreach ($dt_obat->result() as $dt) { 
      $kdobat = $dt->kd_obat;
      $nama = $dt->nm_obat;
      $harga_modal = $dt->harga_modal;
      $harga_jual = $dt->harga_jual;
      $stok = $dt->stok;
      $keterangan = $dt->keterangan;
     }
} else {
      $kdobat = $id;
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-circle"></i> <?php echo $mode?> Data Obat
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Obat/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

    <div class="form-group row">
      <label for="kdobat" class="col-md-2 col-sm-2 col-form-label">ID Obat</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="kdobat" name="kdobat" value="<?php echo $kdobat ?>" readonly>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

  <div class="form-group row">
    <label for="nama" class="col-md-2 col-sm-2 col-form-label">Nama Obat</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="harga_modal" class="col-md-2 col-sm-2 col-form-label">Hrg Modal (Rp.)</label>
    <div class="col-md-3 col-sm-10">
      <input type="number" class="form-control" id="harga_modal" name="harga_modal" placeholder="Harga Modal" value="<?php echo $harga_modal ?>" min="0" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="harga_jual" class="col-md-2 col-sm-2 col-form-label">Hrg Jual (Rp.)</label>
    <div class="col-md-3 col-sm-10">
      <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual ?>" min="0" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="stok" class="col-md-2 col-sm-2 col-form-label">Stok</label>
    <div class="col-md-2 col-sm-10">
      <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?php echo $stok ?>" min="0" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="keterangan" class="col-md-2 col-sm-2 col-form-label">Keterangan</label>
    <div class="col-md-6 col-sm-10">
      <textarea rows="4" cols="120" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required><?php echo $keterangan ?></textarea>
    </div>
  </div>  

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Obat" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>
