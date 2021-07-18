<?php 

  $nm_dokter = "";
  $jns_kelamin = "";
  $tempat_lahir = "";
  $tanggal_lahir = "";
  $alamat = "";
  $no_telepon = "";
  $sip = "";
  $spesialisasi = "";
  $rbpria = "";
  $rbwanita = "";

if($mode=="Edit"){
    foreach ($dt_dokter->result() as $dt) { 
      $kddokter = $dt->kd_dokter;
      $nm_dokter = $dt->nm_dokter;
      $jns_kelamin = $dt->jns_kelamin;
      $tempat_lahir = $dt->tempat_lahir;
      $tanggal_lahir = $dt->tanggal_lahir;
      $alamat = $dt->alamat;
      $no_telepon = $dt->no_telepon;
      $sip = $dt->sip;
      $spesialisasi = $dt->spesialisasi;
      $jns_kelamin = $dt->jns_kelamin;

      ($jns_kelamin == "Laki-laki") ? $rbpria = "checked" : $rbwanita = "checked";
     }
} else {
      $kddokter = $id;
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-headphones"></i> <?php echo $mode?> Data Dokter
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Dokter/simpan" method="POST" name="simpanform" enctype="multipart/form-data">

    <div class="form-group row">
      <label for="kddokter" class="col-md-2 col-sm-2 col-form-label">ID Dokter</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="kddokter" name="kddokter" value="<?php echo $kddokter ?>" readonly>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

  <div class="form-group row">
    <label for="nama" class="col-md-2 col-sm-2 col-form-label">Nama</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nm_dokter ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="gender" class="col-md-2 col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-md-4 col-sm-10">
      <div class="radio">
          <input name="gender" type="radio" id="rbpria" value="Laki-laki" <?php echo "$rbpria";?> required/>&nbsp;<label for="rbpria">Laki-laki</label>
      </div>
      <div class="radio">
          <input name="gender" type="radio" id="rbwanita" value="Perempuan" <?php echo "$rbwanita";?> required/>&nbsp;<label for="rbwanita">Perempuan</label>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="tempat_lahir" class="col-md-2 col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="tanggal_lahir" class="col-md-2 col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-md-6 col-sm-10">
      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tangal Lahir" value="<?php echo $tanggal_lahir ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-md-2 col-sm-2 col-form-label">Alamat</label>
    <div class="col-md-6 col-sm-10">
      <textarea rows="4" cols="120" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required><?php echo $alamat ?></textarea>
    </div>
  </div> 

  <div class="form-group row">
    <label for="telp" class="col-md-2 col-sm-2 col-form-label">No Telepon</label>
    <div class="col-md-4 col-sm-10">
      <input type="text" class="form-control" id="telp" name="telp" placeholder="No Telepon" value="<?php echo $no_telepon ?>" maxlength="13" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="sip" class="col-md-2 col-sm-2 col-form-label">SIP</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="sip" name="sip" placeholder="SIP" value="<?php echo $sip ?>" maxlength="20" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="spesialisasi" class="col-md-2 col-sm-2 col-form-label">Spesialisasi</label>
    <div class="col-md-5 col-sm-10">
      <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Spesialisasi" value="<?php echo $sip ?>" maxlength="100" required>
    </div>
  </div>

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Dokter" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>
