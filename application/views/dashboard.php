<script type="text/javascript">
  function Panggil(){
      noAntri = document.getElementById('no_antri').value;
      if(noAntri == '') alert('Tidak Ada Antrian');
      else{
        var ratus,puluh,satuan,belas,sratus,spuluh,ssatuan,res;

        if(noAntri>999){
              res = 'Inputan Melebihi Batas';
        } else {
          satuan= Math.floor((noAntri % 100) % 10);
          ratus = Math.floor(noAntri / 100);
          puluh = Math.floor((noAntri % 100) / 10);
          belas = (puluh*10)+satuan;

          path = '<?php echo base_url() ?>assets/audio/';
          audioNomor_Antrian = new Audio(path+'Nomor_Antrian.mp3');
          audioRatus = new Audio(path+'ratus.mp3');
          audioPuluh = new Audio(path+'puluh.mp3');

          

              if(ratus>0 && ratus<10){
                if(ratus == 1){
                  sratus = path+'Se.mp3';
                } else{
                  sratus = path+ratus+'.mp3';
                }
              } else{
                sratus = '';
              }

             if(puluh>0 && puluh<10){
                if(puluh == 1){
                  spuluh = path+'Se.mp3';
                } else{
                  spuluh = path+puluh+'.mp3';
                }
             } else{
                spuluh = '';
             }

              if(satuan>0 && satuan<10){
                  ssatuan = path+satuan+'.mp3';
              } else{
                  ssatuan = '';
              }

              if(belas>10 && belas<20){
                puluh = 0;
                if(belas == 11){
                  spuluh = path+'Se.mp3';
                  audioPuluh = new Audio(path+'belas.mp3');
                } else{
                  spuluh = path+(belas-10)+'.mp3';
                  audioPuluh = new Audio(path+'belas.mp3');
                }
              }

      }
      
      audioSRatus = new Audio(sratus);
      audioSPuluh = new Audio(spuluh);
      audioSSatuan = new Audio(ssatuan);

      audioNomor_Antrian.play();
      if(ratus>0){
        audioNomor_Antrian.onended = function(){
          audioSRatus.play()  
        };
        audioSRatus.onended = function(){
          audioRatus.play();
        };

        if(puluh>0){
          audioRatus.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

          if(satuan>0){
            audioPuluh.onended = function(){
              audioSSatuan.play();
            };
          }

        }else if(belas>10 && belas<20){
          audioRatus.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

        }else{
          audioRatus.onended = function(){
            audioSSatuan.play();
          };

        }

      }else{
        if(puluh>0){
          audioNomor_Antrian.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

          if(satuan>0){
            audioPuluh.onended = function(){
              audioSSatuan.play();
            };
          }

        }else if(belas>10 && belas<20){
          audioNomor_Antrian.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

        }else{
          audioNomor_Antrian.onended = function(){
            audioSSatuan.play();
          };

        }

      } 

    }}
</script>

<?php
    $no_antri = $dt_antri['nomor_antri'];
    $tgl = $dt_antri['tanggal_daftar'];
    $nama = $dt_antri['nm_pasien'];

?>

<div class="col-md-12" style="margin-bottom: 30px;">
  <h3>
    <center>
    <i class="fas fa-id-badge"></i> Antrian
    </center>
  </h3>
</div>

<div class="col-md-10 offset-1">

<form clas="row" action="<?php echo base_url() ?>Home/next" method="POST" name="simpanform" enctype="multipart/form-data"">

    <div class="form-group row">
      <label for="no_daftar" class="col-md-2 col-sm-2 col-form-label">No Antrian</label>
      <div class="col-md-2 col-sm-10">
        <input type="text" class="form-control" id="no_antri" name="no_antri" value="<?php echo $no_antri ?>" readonly>
        <input type="hidden" name="tgl" value="<?php echo $tgl ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="nama" class="col-md-2 col-sm-2 col-form-label">Nama</label>
      <div class="col-md-5 col-sm-10">
        <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" readonly>
      </div>
    </div>

  <div class="form-group row col-md-12">

    <div class="btni">
      
      <button type="submit" class="btn btn-danger" name="btn_skip" id="btn_skip">
        Skip <i class="fa fa-angle-double-right"></i> 
      </button>

      <button type="button" class="btn btn-primary" onclick="Panggil()" id="btn_panggil">
        <i class="fa fa-volume-up"></i> Panggil
      </button>

      <button type="submit" class="btn btn-outline-info" name="btn_next" id="btn_next">
        Check & Next <i class="fa fa-chevron-right"></i> 
      </button>

    </div>
  </div>

</form>

</div>

<div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding: 10px">

  	<table class="table table-striped table-hover" id="tabel" style="font-size: 14px;">
  		<thead>
  			<th>No Daftar</th>
  			<th>No Rekam Medik</th>
  			<th>Tgl Daftar</th>
  			<th>Keluhan</th>
	        <th>No Antrian</th>
	        <th>Status</th>
	        <th>ID Petugas</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_pendaftaran->result() as $data){
            echo '
            <tr>
            <td>'.$data->no_daftar.'</td>
            <td>'.$data->nomor_rm.'</td>
            <td>'.$data->tanggal_daftar.'</td>
            <td>'.$data->keluhan.'</td>
            <td>'.$data->nomor_antri.'</td>
            <td>'.$data->status.' Dipanggil</td>
            <td>'.$data->kd_petugas.'</td>
            </tr>';
        } ?>
  		</tbody>
  	</table>

  </div>

