<div class="col-md-12">

  <div class="row">
    <div class="col-md-12">
          <a class="btn btn-outline-primary" role="button" href="Penyakit/tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
    </div>
  </div>  

  <div class="table-responsive" style="border-top: 2px solid #6c757d; margin-top: 10px; padding-top: 10px;">

  	<table class="table table-striped table-hover" id="tabel">
  		    <thead>
  			   <th>Kode Penyakit</th>
           <th>Kelompok Penyakit</th>
           <th>Diagnosa</th>
           <th>Diagnosis</th>
           <th>Opsi</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_penyakit->result() as $data){
            echo '
            <tr>
            <td>'.$data->code_icd_x.'</td>
            <td>'.$data->kelompok_penyakit.'</td>
            <td>'.$data->diagnosa.'</td>
            <td>'.$data->diagnosis.'</td>
            <td>
                <a class="btn btn-outline-primary btn-sm" href="Penyakit/edit/'.md5($data->code_icd_x).'" role="button" data-toggle="tooltip" data-placement="top" title="Hapus">
                    <i class="fa fa-edit"></i>
                </a>

                <a class="btn btn-outline-dark btn-sm" href="Penyakit/delete/'.md5($data->code_icd_x).'" role="button" onclick="return confirm(\'Apakah Anda Ingin Menghapus Data Ini ??\')" 
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