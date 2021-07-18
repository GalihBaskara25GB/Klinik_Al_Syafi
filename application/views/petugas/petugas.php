<?php 
  $level = $this->session->userdata('level');
  ($level == 'Apoteker' || $level == 'Dokter' || $level == 'Petugas') ? $dtManip = false : $dtManip = true;
?>

<div class="col-md-12">
  <?php if($dtManip){ ?>
  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Petugas/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>
  <?php } ?>  

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel">
  		<thead>
  			<th>ID Petugas</th>
  			<th>Nama</th>
  			<th>No Telepon</th>
  			<th>Username</th>
  			<th>Level</th>
        <?php if($dtManip) echo '<th>Opsi</th>' ?>
  		</thead>
  		<tbody>
  		<?php
  		foreach ($dt_petugas->result() as $data){
            echo '
            <tr>
                <td>'.$data->kd_petugas.'</td>
                <td>'.$data->nm_petugas.'</td>
                <td>'.$data->no_telepon.'</td>
                <td>'.$data->username.'</td>
                <td>'.$data->level.'</td>';

          if($dtManip){    
            echo '<td>
                    <a class="btn btn-outline-primary btn-sm" href="Petugas/edit/'.md5($data->kd_petugas).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-outline-dark btn-sm" href="Petugas/delete/'.md5($data->kd_petugas).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
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