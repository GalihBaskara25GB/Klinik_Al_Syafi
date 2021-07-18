<div class="col-md-12">

  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Rawat/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>  

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel" style="font-size: 14px">
  		<thead>
  			<th>No Rawat</th>
        <th>Jenis Rawat</th>
        <th>No Pendaftaran</th>
        <th>Tgl Masuk</th>
        <th>Tgl Keluar</th>
  			<th>Diagnosa</th>
        <th>Kode Penyakit</th>
        <th>Total</th>
  			<th>Opsi</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_rawat->result() as $data){
            echo '
            <tr>
            <td>'.$data->no_rawat.'</td>
            <td>Rawat '.$data->jenis_rawat.'</td>
            <td>'.$data->no_daftar.'</td>
            <td>'.$data->tgl_rawat.'</td>
            <td>'.$data->tgl_keluar.'</td>
            <td>'.$data->diagnosa.'</td>
            <td>'.$data->code_icd_x.'</td>
            <td>Rp. '.$data->total.'</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="Rawat/detRawat/'.md5($data->no_rawat).'" role="button" data-toggle="tooltip" data-placement="top" title="Detail Rawat">
                        <i class="fa fa-search"></i>
                    </a>
                    <a class="btn btn-outline-dark btn-sm" href="Rawat/delete/'.md5($data->no_rawat).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
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