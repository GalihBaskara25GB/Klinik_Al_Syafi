<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=penyakit-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table>
  		    <thead>
  			   <th>Kode Penyakit</th>
           <th>Kelompok Penyakit</th>
           <th>Diagnosa</th>
           <th>Diagnosis</th>
          </thead>
          <tbody>
          <?php 
          foreach ($dt_penyakit->result() as $data){
            echo '
            <tr>
            <td>'.$data->code_icd_x.'</td>
            <td>'.$data->kelompok_penyakit.'</td>
            <td>'.$data->diagnosa.'</td>
            <td>'.$data->diagnosis.'</td>';
        } ?>
  		</tbody>
  	</table>