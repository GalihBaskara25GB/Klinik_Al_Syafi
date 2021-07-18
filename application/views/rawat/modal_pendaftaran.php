<div class="modal fade" id="modal_pendaftaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 100%">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="col-md-10">
          <h4 class="modal-title" id="myModalLabel">
            <span class="glyphicon glyphicon-search"></span> Pilih Data Pendaftaran               
          </h4>
        </div>
    
        <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

      </div>

      <div class="modal-body table-responsive">
        <table class="table table-striped" style="font-size: small;" id="tabel2">
          <thead>
            <th>No Daftar</th>
            <th>No Rekam Medik</th>
            <th>Tgl Daftar</th>
            <th>Keluhan</th>
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
                    <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pilih Data Ini" onClick="simpanform.no_daftar.value = \''.$data->no_daftar.'\'; simpanform.tgl_rawat.value = \''.$data->tanggal_daftar.'\'" data-dismiss="modal">
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