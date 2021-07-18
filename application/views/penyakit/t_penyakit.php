<?php 

  $diagnosis = "";
  $diagnosa = "";
  $kdpenyakit = "";
  $kel="";

if($mode=="Edit"){
    foreach ($dt_penyakit->result() as $dt) { 
      $kdpenyakit = $dt->code_icd_x;
      $kel = $dt->kelompok_penyakit;
      $diagnosa = $dt->diagnosa;
      $diagnosis = $dt->diagnosis;
    }
}

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-heartbeat"></i> <?php echo $mode?> Data Penyakit
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Penyakit/simpan" method="POST" name="simpanform" enctype="multipart/form-data"">

    <div class="form-group row">
      <label for="kdpenyakit" class="col-md-2 col-sm-2 col-form-label">Kode Penyakit</label>
      <div class="col-md-3 col-sm-10">
        <input type="text" class="form-control" id="kdpenyakit" name="kdpenyakit" value="<?php echo $kdpenyakit ?>" required>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="kel" class="col-md-2 col-sm-2 col-form-label">Kelompok Penyakit</label>
      <div class="col-md-4 col-sm-10">
        <input type="text" class="form-control" id="kel" name="kel" value="<?php echo $kel ?>" required>
        <input type="hidden" name="mode" value="<?php echo $mode ?>">
      </div>
    </div>

  <div class="form-group row">
    <label for="diagnosa" class="col-md-2 col-sm-2 col-form-label">Diagnosa</label>
    <div class="col-md-6 col-sm-10">

      <textarea class="form-control" id="diagnosa" name="diagnosa" placeholder="Diagnosa" rows="4"  required><?php echo $diagnosa ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="diagnosis" class="col-md-2 col-sm-2 col-form-label">Diagnosis</label>
    <div class="col-md-6 col-sm-10">
      <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Diagnosis" rows="4" required><?php echo $diagnosa ?></textarea>
    </div>
  </div>

  <div class="form-group" style="width: 100%;border-top: 1px solid #6c757d; padding: 5px;">

    <div class="btni" style="float: right;">
      <button type="submit" class="btn btn-outline-primary" >
        <i class="fa fa-check"></i> Simpan
      </button>
      
      <a role="button" class="btn btn-danger btn-batal" href="<?php echo base_url()?>Penyakit" onclick="return confirm('Apakah Anda Yakin Akan Membatalkan?\nData Yang Diinputkan Tidak Akan Diproses!!');">
        Batal
      </a>
    </div>
  </div>
</form>

</div>
