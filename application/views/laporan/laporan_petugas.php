<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=petugas-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="table table-striped table-hover" id="tabel">
  		<thead>
  			<th>ID Petugas</th>
  			<th>Nama</th>
  			<th>No Telepon</th>
  			<th>Username</th>
  			<th>Level</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_petugas->result() as $data){
            echo '
            <tr>
            <td>'.$data->kd_petugas.'</td>
            <td>'.$data->nm_petugas.'</td>
            <td>'.$data->no_telepon.'</td>
            <td>'.$data->username.'</td>
            <td>'.$data->level.'</td>';
        } ?>
  		</tbody>
  	</table>