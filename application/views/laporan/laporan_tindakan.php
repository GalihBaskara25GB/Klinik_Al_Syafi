<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tindakan-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="table table-striped table-hover" id="tabel">
  		    <thead>
  			   <th>Kode Tindakan</th>
           <th>Tindakan</th>
           <th>Harga (Rp.)</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_tindakan->result() as $data){
            echo '
            <tr>
            <td>'.$data->kd_tindakan.'</td>
            <td>'.$data->nm_tindakan.'</td>
            <td>'.$data->harga.'</td>';
        } ?>
  		</tbody>
  	</table>