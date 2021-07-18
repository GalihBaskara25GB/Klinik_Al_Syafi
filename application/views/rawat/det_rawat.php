<?php 
  foreach ($dt_rawat->result() as $dt) {
    $diagnosa = $dt->diagnosa;
    $no_daftar = $dt->no_daftar;
    $tgl_rawat = $dt->tgl_rawat;
    $tgl_keluar = $dt->tgl_keluar;
    $keterangan = $dt->keterangan;
    $jns_rawat = $dt->jenis_rawat;
    $uang_bayar = $dt->uang_bayar;
    $kd_petugas = $dt->kd_petugas;
    $no_rawat = $dt->no_rawat;
    $total = $dt->total;
    $kembalian = $uang_bayar - $total;
    $kd_penyakit = $dt->code_icd_x;
  }
?>

<div class="col-md-12 row" style="margin-bottom: 30px;">
  <div class="col-md-10">
    <h3>
      <center>
      <i class="fas fa-ambulance"></i> Detail Rawat
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
  <form clas="row" action="<?php echo base_url() ?>Rawat/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

      <div class="form-group row">
        <label for="no_rawat" class="col-md-4 col-sm-2 col-form-label">No Rawat</label>
        <div class="col-md-8 col-sm-10">
          <input type="text" class="form-control" id="no_rawat" value="<?php echo $no_rawat ?>" readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="no_rawat" class="col-md-4 col-sm-2 col-form-label">Jenis Rawat</label>
        <div class="col-md-8 col-sm-10">
          <input type="text" class="form-control" id="no_rawat" value="Rawat <?php echo $jns_rawat ?>" readonly>
        </div>
      </div>

    <div class="form-group row">
      <label for="diagnosa" class="col-md-4 col-sm-2 col-form-label">Diagnosa</label>
      <div class="col-md-8 col-sm-10">
        <textarea cols="38" rows="4" id="diagnosa" readonly><?php echo $diagnosa ?></textarea>
      </div>
    </div>

    <div class="form-group row">
      <label for="kd_penyakit" class="col-md-4 col-sm-2 col-form-label">Kode Penyakit</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="kd_penyakit" value="<?php echo $kd_penyakit?>" readonly>
      </div>
    </div>
   
</div>

<div class="col-md-6"> 

    <div class="form-group row">
      <label for="no_daftar" class="col-md-4 col-sm-2 col-form-label">No Pendaftaran</label>
      <div class="col-md-6 col-sm-10">
        <input type="text" class="form-control" id="no_daftar" value="<?php echo $no_daftar ?>"readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="tgl_rawat" class="col-md-4 col-sm-2 col-form-label">Tanggal Masuk</label>
      <div class="col-md-8 col-sm-10">
        <input type="date" class="form-control" id="tgl_rawat" value="<?php echo $tgl_rawat ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="tgl_keluar" class="col-md-4 col-sm-2 col-form-label">Tanggal Keluar</label>
      <div class="col-md-8 col-sm-10">
        <input type="date" class="form-control" id="tgl_now" value="<?php echo $tgl_keluar ?>" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="Keterangan" class="col-md-4 col-sm-2 col-form-label">Keterangan</label>
      <div class="col-md-8 col-sm-10">
        <textarea cols="38" rows="4" id="keterangan" readonly><?php echo $keterangan ?></textarea>
      </div>
    </div>

</div>

  <div class="col-md-12" style="padding: 0 0 0 10px;">
    
    <br>
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Obat/Tindakan</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
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
            </tr>';
     } ?>
        <tr>
          <td colspan="3">Grand Total</td>
          <td><?php echo $gr_jml ?></td>
          <td>Rp. <?php echo $total ?></td>
        </tr>
      </tbody>
    </table>

    <div class="form-group row">
      <label for="uang_bayar" class="col-md-4 col-sm-2 col-form-label">Uang Bayar</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="uang_bayar" value="Rp. <?php echo $total ?>" readonly></input>
      </div>
    </div>

    <div class="form-group row">
      <label for="kembalian" class="col-md-4 col-sm-2 col-form-label">Kembalian</label>
      <div class="col-md-8 col-sm-10">
        <input type="text" class="form-control" id="kembalian" value="Rp. <?php echo $kembalian ?>" readonly></input>
      </div>
    </div>  

  </div>

  </form>

</div>