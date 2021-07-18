<div class="modal fade" id="modal_obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 100%">
  <div class="modal-dialog modal-lg" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
    
        <div class="col-md-10">
          <h4 class="modal-title" id="myModalLabel">
            <span class="glyphicon glyphicon-search"></span> Pilih Data Obat               
          </h4>
        </div>
    
        <div class="col-md-1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>

      </div>

      <div class="modal-body table-responsive">
        <table class="table table-striped" style="font-size: small;" id="tabel2">
            <thead>
            <th>Kode Obat</th>
            <th>Nama</th>
            <th>Hrg Modal</th>
            <th>Hrg Jual</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Opsi</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_obat->result() as $data){
                echo '
                <tr>
                <td>'.$data->kd_obat.'</td>
                <td>'.$data->nm_obat.'</td>
                <td>Rp. '.$data->harga_modal.'</td>
                <td>Rp. '.$data->harga_jual.'</td>
                <td>'.$data->stok.'</td>
                <td>'.$data->keterangan.'</td>
                <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Pilih Data Ini" onClick="simpanform.obat_tindakan.value = \''.$data->nm_obat.'\'; simpanform.jumlah.max = \''.$data->stok.'\'; simpanform.harga.value = \''.$data->harga_jual.'\'" data-dismiss="modal">
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