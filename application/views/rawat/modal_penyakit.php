<div class="modal fade" id="modal_penyakit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 100%">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="col-md-10">
          <h4 class="modal-title" id="myModalLabel">
            <span class="glyphicon glyphicon-search"></span> Pilih Data Penyakit               
          </h4>
        </div>
    
        <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

      </div>

      <div class="modal-body table-responsive">
        <table class="table table-striped" style="font-size: small;" id="tabel2">
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
                    <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pilih Data Ini" onClick="simpanform.kode_penyakit.value = \''.$data->code_icd_x.'\'" data-dismiss="modal">
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