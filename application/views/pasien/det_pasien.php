<?php  
  foreach ($dt_pasien->result() as $dt) { 
    $no_rm = $dt->nomor_rm;
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
  }

?>

<div class="col-md-12 row" style="margin-bottom: 30px;">
  <div class="col-md-10">
    <h3>
      <center>
      <i class="fas fa-wheelchair"></i> Detail Data Pasien
      </center>
    </h3>
  </div>
  <div class="col-md-2">
    <button class="btn btn-outline-dark" onclick="window.history.back()">
      Kembali
    </button>
  </div>
</div>

<div class="row col-md-12">

<div class="col-md-6">

  <form clas="row" action="<?php echo base_url() ?>Pasien/simpan" method="POST" name="simpanform" enctype="multipart/form-data">

      <div class="form-group row">
        <label for="no_rm" class="col-md-4 col-sm-4 col-form-label">Nomor RM</label>

        <div class="col-md-8 col-sm-10">
          <input type="text" class="form-control" id="no_rm" value="<?php echo $no_rm ?>" readonly>
        </div>

      </div>

    <div class="form-group row">
      <label for="nik" class="col-md-4 col-sm-4 col-form-label">Nomor BPJS</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="no_bpjs" value="<?php echo $no_bpjs ?>" readonly>
      </div>
    </div>  

    <div class="form-group row">
      <label for="nama" class="col-md-4 col-sm-4 col-form-label">Nama</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="nama" value="<?php echo $nm_pasien ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="nik" class="col-md-4 col-sm-4 col-form-label">Nomor Identitas</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="nik" value="<?php echo $nik ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="gender" class="col-md-4 col-sm-4 col-form-label">Jenis Kelamin</label>
      <div class="col-md-4 col-sm-10">
        <input type="text" class="form-control" id="gender" value="<?php echo $jns_kelamin ?>" readonly>
      </div>
    </div> 

    <div class="form-group row">
      <label for="tempat_lahir" class="col-md-4 col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="tempat_lahir"  value="<?php echo $tempat_lahir.', '.$tanggal_lahir ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-sm-4 col-form-label">Alamat</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="alamat" value="<?php echo $alamat ?>" readonly>
      </div>
    </div> 

</div>

<div class="col-md-6">

    <div class="form-group row">
      <label for="telp" class="col-md-4 col-sm-4 col-form-label">No Telepon</label>
      <div class="col-md-4 col-sm-10">
        <input type="text" class="form-control" id="telp" value="<?php echo $no_telepon ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="gol_darah" class="col-md-4 col-sm-4 col-form-label">Gol Darah</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="gol_darah" value="<?php echo $gol_darah ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="agama" class="col-md-4 col-sm-4 col-form-label">Agama</label>
      <div class="col-md-4 col-sm-10">
        <input type="text" class="form-control" id="agama" value="<?php echo $agama ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="pekerjaan" class="col-md-4 col-sm-4 col-form-label">Pekerjaan</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="pekerjaan" value="<?php echo $pekerjaan ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="tgl_rekam" class="col-md-4 col-sm-4 col-form-label">Tgl Rekam</label>
      <div class="col-md-5 col-sm-10">
        <input type="date" class="form-control" name="tgl_rekam" value="<?php echo $tanggal_rekam ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="kd_petugas" class="col-md-4 col-sm-4 col-form-label">ID Petugas</label>
      <div class="col-md-3 col-sm-10">
        <input type="text"  class="form-control" id="kd_petugas" value="<?php echo $kd_petugas ?>" readonly>
      </div>
    </div>

  </form>

</div>
</div>
<br>
<div class="container" style="margin-bottom: 20px;">
  <h5><center>Riwayat Penyakit</center></h5>

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

    <table class="table table-striped table-hover" id="tabel" style="font-size: 14px">
      <thead>
        <th>Jenis Rawat</th>
        <th>Diagnosa</th>
        <th>Tgl Masuk</th>
        <th>Tgl Keluar</th>
        <th>Keterangan</th>
      </thead>
      <tbody>
      <?php 
      foreach ($dt_penyakit->result() as $data){
            echo '
            <tr>
            <td>'.$data->jenis_rawat.'</td>
            <td>'.$data->diagnosa.'</td>
            <td>'.$data->tgl_rawat.'</td>
            <td>'.$data->tgl_keluar.'</td>
            <td>'.$data->keterangan.'</td>
            </tr>';
        } ?>
      </tbody>
    </table>

  </div>
</div>
