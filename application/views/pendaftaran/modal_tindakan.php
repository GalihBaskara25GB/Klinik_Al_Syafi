<div class="modal fade" id="modal_tindakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 100%">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="col-md-10">
          <h4 class="modal-title" id="myModalLabel">
            <span class="glyphicon glyphicon-search"></span> Pilih Data Tindakan               
          </h4>
        </div>
    
        <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

      </div>

      <div class="modal-body table-responsive">
        <table class="table table-striped" style="font-size: small;" id="tabel2">
            <thead>
            <th>Kode Tindakan</th>
            <th>Tindakan</th>
            <th>Harga (Rp.)</th>
            <th>Opsi</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_tindakan->result() as $data){
                echo '
                <tr>
                <td>'.$data->kd_tindakan.'</td>
                <td>'.$data->nm_tindakan.'</td>
                <td>'.$data->harga.'</td>
                <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pilih Data Ini" onClick="simpanform.kd_tindakan.value = \''.$data->kd_tindakan.'\'" data-dismiss="modal">
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