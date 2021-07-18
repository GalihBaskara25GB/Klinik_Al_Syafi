
<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-copy"></i> Laporan
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Laporan/generate" method="POST" name="simpanform" enctype="multipart/form-data">

  <div class="form-group row">
    <label for="laporan_data" class="col-md-2 col-sm-2 col-form-label">Data Laporan</label>
    <div class="col-md-4 col-sm-10">
      <select class="form-control" id="laporan_data" name="laporan_data" required>
        <option value="penjualan"> Data Penjualan</option>
        <option value="rawat"> Data Rawat</option>
        <option value="pasien"> Data Pasien</option>
        <option value="obat"> Data Obat</option>
        <option value="penyakit"> Data Penyakit</option>
        <option value="petugas"> Data Petugas</option>
        <option value="dokter"> Data Dokter</option>
        <option value="tindakan"> Data Tindakan</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="tanggal_start" class="col-md-2 col-sm-2 col-form-label">Dari Tanggal</label>
    <div class="col-md-3 col-sm-10">
      <input type="date" class="form-control" id="tanggal_start" name="tanggal_start" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="tgl_now" class="col-md-2 col-sm-2 col-form-label">Sampai</label>
    <div class="col-md-3 col-sm-10">
      <input type="date" class="form-control" id="tgl_now" name="tanggal_end" required>
    </div>
  </div>

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Buat Laporan
      </button>
    </div>
  </div>
</form>

</div>

<script>
  function gettgl(){
    var d, nowdate, year, month;
    d = new Date();
    nowdate = d.getDate();
    month = d.getMonth()+1; 
    year = d.getFullYear();

    document.getElementById("tgl_rekam").value =  year + '-' + month + '-' + nowdate;
  };
</script>
