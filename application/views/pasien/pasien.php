<?php 
  $level = $this->session->userdata('level');
  ($level == 'Apoteker' || $level == 'Dokter') ? $dtManip = false : $dtManip = true;
?>

<div class="col-md-12">

  <?php if($dtManip){ ?>
  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Pasien/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>
  <?php } ?>   

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel" style="font-size: 14px">
  		<thead>
  			<th>No Rekam Medis</th>
        <th>No BPJS</th>
  			<th>Nama</th>
  			<th>No Identitas</th>
  			<th>TTL</th>
  			<th>Alamat</th>
        <th>No Telepon</th>
  			<th>Opsi</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_pasien->result() as $data){
            echo '
            <tr>
            <td>'.$data->nomor_rm.'</td>
            <td>'.$data->no_bpjs.'</td>
            <td>'.$data->nm_pasien.'</td>
            <td>'.$data->no_identitas.'</td>
            <td>'.$data->tempat_lahir.', '.$data->tanggal_lahir.'</td>
            <td>'.$data->alamat.'</td>
            <td>'.$data->no_telepon.'</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="Pasien/detPasien/'.md5($data->nomor_rm).'" role="button" data-toggle="tooltip" data-placement="top" title="Detail Pasien">
                        <i class="fa fa-search"></i>
                    </a>';
            if($dtManip){    
            echo '
                    <a class="btn btn-outline-primary btn-sm" href="Pasien/edit/'.md5($data->nomor_rm).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a class="btn btn-outline-dark btn-sm" href="Pasien/delete/'.md5($data->nomor_rm).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
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