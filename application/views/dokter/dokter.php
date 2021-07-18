<?php 
  $level = $this->session->userdata('level');
  ($level == 'Apoteker' || $level == 'Dokter' || $level == 'Petugas') ? $dtManip = false : $dtManip = true;
?>

<div class="col-md-12">
  <?php if($dtManip){ ?>
  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Dokter/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>
  <?php } ?>   

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel" style="font-size: 14px">
  		<thead>
  			<th>ID Dokter</th>
  			<th>Nama</th>
  			<th>Gender</th>
  			<th>TTL</th>
  			<th>Alamat</th>
        <th>No Telepon</th>
        <th>SIP</th>
        <th>Spesialisasi</th>
  			<?php if($dtManip) echo '<th>Opsi</th>' ?>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_dokter->result() as $data){
            echo '
            <tr>
            <td>'.$data->kd_dokter.'</td>
            <td>'.$data->nm_dokter.'</td>
            <td>'.$data->jns_kelamin.'</td>
            <td>'.$data->tempat_lahir.', '.$data->tanggal_lahir.'</td>
            <td>'.$data->alamat.'</td>
            <td>'.$data->no_telepon.'</td>
            <td>'.$data->sip.'</td>
            <td>'.$data->spesialisasi.'</td>';
            if($dtManip){    
            echo '
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="Dokter/edit/'.md5($data->kd_dokter).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-outline-dark btn-sm" href="Dokter/delete/'.md5($data->kd_dokter).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
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