<div class="modal fade" id="modal_rm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 100%">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="col-md-10">
          <h4 class="modal-title" id="myModalLabel">
            <span class="glyphicon glyphicon-search"></span> Pilih Data Rekam Medis               
          </h4>
        </div>
    
        <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

      </div>

      <div class="modal-body mx-auto mw-100">
        <table class="table table-striped table-responsive" style="font-size: small;" id="tabel">
            <thead>
            <th>No RM</th>
            <th>Nama</th>
            <th>No Identitas</th>
            <th>Gender</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_pasien->result() as $data){
                echo '
                <tr>
                <td>'.$data->nomor_rm.'</td>
                <td>'.$data->nm_pasien.'</td>
                <td>'.$data->no_identitas.'</td>
                <td>'.$data->jns_kelamin.'</td>
                <td>'.$data->tempat_lahir.', '.$data->tanggal_lahir.'</td>
                <td>'.$data->alamat.'</td>
                <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pilih Data Ini" onClick="simpanform.no_rm.value = \''.$data->nomor_rm.'\'" data-dismiss="modal">
                          <i class="fas fa-check"></i>
                        </button>
                      </td>
                    </tr>';
          } ?>
    
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>