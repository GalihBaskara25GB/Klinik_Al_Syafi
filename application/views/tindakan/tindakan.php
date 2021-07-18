<?php 
  $level = $this->session->userdata('level');
  ($level == 'Apoteker' || $level == 'Dokter') ? $dtManip = false : $dtManip = true;
?>

<div class="col-md-12">
  <?php if($dtManip){ ?>
  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Tindakan/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>
  <?php } ?>   

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel">
  		    <thead>
  			   <th>Kode Tindakan</th>
           <th>Tindakan</th>
           <th>Harga (Rp.)</th>
           <?php if($dtManip) echo '<th>Opsi</th>' ?>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_tindakan->result() as $data){
            echo '
            <tr>
            <td>'.$data->kd_tindakan.'</td>
            <td>'.$data->nm_tindakan.'</td>
            <td>'.$data->harga.'</td>';
            if($dtManip){    
            echo '<td>
                <a class="btn btn-outline-primary btn-sm" href="Tindakan/edit/'.md5($data->kd_tindakan).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                    <i class="fa fa-edit"></i>
                </a>

                <a class="btn btn-outline-dark btn-sm" href="Tindakan/delete/'.md5($data->kd_tindakan).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
                    data-toggle="tooltip" data-placement="top" title="Hapus">
                    <i class="fa fa-trash"></i>
                </a>
            </td>';
            }
            echo '</tr>';
        } ?>
  		</tbody>
  	</table>

  </div>
</div>