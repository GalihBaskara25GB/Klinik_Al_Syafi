<?php 

  $nm_pasien = "";
  $no_bpjs = "";
  $jns_kelamin = "";
  $tempat_lahir = "";
  $tanggal_lahir = "";
  $tanggal_rekam = "";
  $kd_petugas = "";
  $alamat = "";
  $no_telepon = "";
  $pekerjaan = "";
  $tanggal_rekam = '';
  $kd_petugas = $this->session->userdata('kd_petugas');
  $nik = "";
  $gol_darah = "";
  $agama = "";
  $rbpria = "";
  $rbwanita = "";
  $islam = '';
  $kristen = '';
  $katolik = '';
  $hindu = '';
  $budha = '';
  $konghucu = '';
  $a='';
  $b='';
  $ab='';
  $o='';
  $nomor_kk = '';
  $readonly = '';

  for ($i=0; $i < 19; $i++) { 
    ${"_$i"} = '';
  }

if($mode=="Edit"){
    foreach ($dt_pasien->result() as $dt) { 
      // die($dt->nomor_rm);
      $nomor_rm = substr($dt->nomor_rm,-6);
      $kd_desa = substr($dt->nomor_rm, 0,2);
      $nomor_kk = substr($dt->nomor_rm, 2,16);

      $no_bpjs = $dt->no_bpjs;
      $nm_pasien = $dt->nm_pasien;
      $jns_kelamin = $dt->jns_kelamin;
      $nik = $dt->no_identitas;
      $gol_darah = $dt->gol_darah;
      $tempat_lahir = $dt->tempat_lahir;
      $tanggal_lahir = $dt->tanggal_lahir;
      $alamat = $dt->alamat;
      $no_telepon = $dt->no_telepon;
      $pekerjaan = $dt->pekerjaan;
      $jns_kelamin = $dt->jns_kelamin;
      $tanggal_rekam = $dt->tanggal_rekam;
      $kd_petugas = $dt->kd_petugas;
      $agama = $dt->agama;
      $tgl_rekam = $dt->tanggal_rekam;


      if($agama == 'Islam') $islam = 'selected';
      else if($agama == 'Kristen') $kristen = 'selected';
      else if($agama == 'Katolik') $katolik = 'selected';
      else if($agama == 'Hindu') $hindu = 'selected';
      else if($agama == 'Budha') $budha = 'selected';
      else $konghucu = 'selected';

      if($gol_darah == 'A') $a = 'selected';
      else if($gol_darah == 'B') $b = 'selected';
      else if($gol_darah == 'AB') $ab = 'selected';
      else $o = 'selected';

      ($jns_kelamin == 'Laki-laki') ? $rbpria = 'checked' : $rbwanita = 'checked';

      for ($i=1; $i < 19; $i++) { 
        if($i <10){
          if($kd_desa == "0$i") ${"_$i"} = 'selected';
          else ${"_$i"} = 'disabled';
        } else {
          if($kd_desa == $i) ${"_$i"} = 'selected';
          else ${"_$i"} = 'disabled';
        }
        
      }
      $readonly = 'readonly';
     }
} else {
      $nomor_rm = $id;
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-wheelchair"></i> <?php echo $mode?> Data Pasien
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Pasien/simpan" method="POST" name="simpanform" enctype="multipart/form-data">

    <div class="form-group row">
      <label for="no_rm" class="col-md-2 col-sm-2 col-form-label">Nomor RM</label>
            
      <div class="col-md-3 col-sm-10">
        <select class="form-control" id="kd_desa" name="kd_desa" required <?php echo $readonly; ?>>
          <option value="01" <?php echo $_1 ?>> 01 - Sumberrejo</option>
          <option value="02" <?php echo $_2 ?>> 02 - Winongan Kidul</option>
          <option value="03" <?php echo $_3 ?>> 03 - Kandung</option>
          <option value="04" <?php echo $_4 ?>> 04 - Sidepan</option>
          <option value="05" <?php echo $_5 ?>> 05 - Prodo</option>
          <option value="06" <?php echo $_6 ?>> 06 - Umbulan</option>
          <option value="07" <?php echo $_7 ?>> 07 - Penataan</option>
          <option value="08" <?php echo $_8 ?>> 08 - Kedungrejo</option>
          <option value="09" <?php echo $_9 ?>> 09 - Gading</option>
          <option value="10" <?php echo $_10 ?>> 10 - Mendalan</option>
          <option value="11" <?php echo $_11 ?>> 11 - Jeladri</option>
          <option value="12" <?php echo $_12 ?>> 12 - Bandaran</option>
          <option value="13" <?php echo $_13 ?>> 13 - Winongan Lor</option>
          <option value="14" <?php echo $_14 ?>> 14 - Lebak</option>
          <option value="15" <?php echo $_15 ?>> 15 - Menyarik</option>
          <option value="16" <?php echo $_16 ?>> 16 - Karang Tengah</option>
          <option value="17" <?php echo $_17 ?>> 17 - Minggir</option>
          <option value="18" <?php echo $_18 ?>> 18 - Sruwi</option>
        </select>
      </div>

      <div class="col-md-4 col-sm-10">
        <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $nomor_kk ?>" placeholder="Nomor KK" maxlength="16" required <?php echo $readonly; ?> >
      </div>

      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?php echo $nomor_rm ?>" readonly>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>

    </div>

  <div class="form-group row">
    <label for="nik" class="col-md-2 col-sm-2 col-form-label">Nomor BPJS</label>
    <div class="col-md-5 col-sm-10">
      <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" placeholder="Nomor BPJS" value="<?php echo $no_bpjs ?>" maxlength="13" required>
    </div>
    <div class="col-md-4 col-sm-3">
        <a role="button" class="btn btn-outline-success" target="_new" href="https://daftar.bpjs-kesehatan.go.id/bpjs-checking/">
          <i class="fas fa-search"></i> Cek
        </a>
    </div>
  </div>  

  <div class="form-group row">
    <label for="nama" class="col-md-2 col-sm-2 col-form-label">Nama</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nm_pasien ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="nik" class="col-md-2 col-sm-2 col-form-label">Nomor Identitas</label>
    <div class="col-md-5 col-sm-10">
      <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Identitas" value="<?php echo $nik ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="gender" class="col-md-2 col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-md-4 col-sm-10">
      <div class="radio">
          <input name="gender" type="radio" id="rbpria" value="Laki-laki" <?php echo "$rbpria";?> required/>&nbsp;<label for="rbadmin">Laki-laki</label>
      </div>
      <div class="radio">
          <input name="gender" type="radio" id="rbwanita" value="Perempuan" <?php echo "$rbwanita";?> required/>&nbsp;<label for="rbuser">Perempuan</label>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="gol_darah" class="col-md-2 col-sm-2 col-form-label">Gol Darah</label>
    <div class="col-md-2 col-sm-10">
      <select class="form-control" id="gol_darah" name="gol_darah" required>
        <option value="A" <?php echo $a ?>> A</option>
        <option value="B" <?php echo $b ?>> B</option>
        <option value="AB" <?php echo $ab ?>> AB</option>
        <option value="O" <?php echo $o ?>> O</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="agama" class="col-md-2 col-sm-2 col-form-label">Agama</label>
    <div class="col-md-4 col-sm-10">
      <select class="form-control" id="agama" name="agama" required>
        <option value="Islam" <?php echo $islam ?>> Islam</option>
        <option value="Kristen" <?php echo $kristen ?>> Kristen</option>
        <option value="Katolik" <?php echo $katolik ?>> Katolik</option>
        <option value="Hindu" <?php echo $hindu ?>> Hindu</option>
        <option value="Budha" <?php echo $budha ?>> Budha</option>
        <option value="Konghucu" <?php echo $konghucu ?>> Konghucu</option>
      </select>
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
    <div class="col-md-4 col-sm-10">
      <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" placeholder="Tangal Lahir" value="<?php echo $tanggal_lahir ?>" required>
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
    <label for="pekerjaan" class="col-md-2 col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-md-5 col-sm-10">
      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan ?>" maxlength="50" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="tgl_now" class="col-md-2 col-sm-2 col-form-label">Tgl Rekam</label>
    <div class="col-md-4 col-sm-10">
      <input type="date" class="form-control" id="tgl_now" name="tgl_rekam" value="<?php echo $tanggal_rekam ?>" readonly required >
    </div>
  </div>

  <div class="form-group row">
    <label for="kd_petugas" class="col-md-2 col-sm-2 col-form-label">ID Petugas</label>
    <div class="col-md-3 col-sm-10">
      <input type="text"  class="form-control" id="kd_petugas" name="kd_petugas" value="<?php echo $kd_petugas ?>" required readonly>
    </div>
  </div>

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Pasien" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>
