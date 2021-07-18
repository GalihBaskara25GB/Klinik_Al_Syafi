<div class="col-md-12">

  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Pendaftaran/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>  

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel" style="font-size: 14px;">
  		<thead>
  			<th>No Daftar</th>
  			<th>No Rekam Medik</th>
  			<th>Tgl Daftar</th>
  			<th>Keluhan</th>
        <th>No Antrian</th>
        <th>Status</th>
        <th>ID Petugas</th>
  			<th>Opsi</th>
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
                <td>
                    <a class="btn btn-outline-dark btn-sm" href="Pendaftaran/delete/'.md5($data->no_daftar).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
                        data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>';
        } ?>
  		</tbody>
  	</table>

  </div>
</div>