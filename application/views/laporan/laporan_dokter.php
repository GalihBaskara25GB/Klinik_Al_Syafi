<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=dokter-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
  	<table>
  		<thead>
  			<th>ID Dokter</th>
  			<th>Nama</th>
  			<th>Gender</th>
  			<th>TTL</th>
  			<th>Alamat</th>
        <th>No Telepon</th>
        <th>SIP</th>
        <th>Spesialisasi</th>
        <th>Bagi Hasil</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_dokter->result() as $data){
            echo '
            <tr>
            <td>'.$data->kd_dokter.'</td>
            <td>'.$data->nm_dokter.'</td>
            <td>'.$data->jns_kelamin.'</td>
            <td>'.$data->tempat_lahir.', '.$data->tanggal_lahir.'</td>
            <td>'.$data->alamat.'</td>
            <td>'.$data->no_telepon.'</td>
            <td>'.$data->sip.'</td>
            <td>'.$data->spesialisasi.'</td>
            <td>'.$data->bagi_hasil.'</td>';
        } ?>
  		</tbody>
  	</table>