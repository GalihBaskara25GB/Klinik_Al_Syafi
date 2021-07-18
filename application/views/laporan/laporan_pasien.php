<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=pasien-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<table>
  		<thead>
			<th>No RM</th>
			<th>Nama</th>
			<th>No Identitas</th>
        <th>Gender</th>
        <th>Gol Darah</th>
        <th>Agama</th>
  			<th>TTL</th>
  			<th>Alamat</th>
        <th>No Telepon</th>
        <th>Pekerjaan</th>
        <th>Tanggal Rekam</th>
        <th>ID Petugas</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_pasien->result() as $data){
            $koneksidb = mysqli_connect("localhost","root","","klinik_al_syafi");
            $qry2 = "SELECT nm_petugas FROM petugas WHERE kd_petugas='$data->kd_petugas'";
            $myQry2 = mysqli_query($koneksidb,$qry2)  or die ("Query salah");
            $petugas = mysqli_fetch_array($myQry2);

            echo '
            <tr>
            <td>'.$data->nomor_rm.'</td>
            <td>'.$data->nm_pasien.'</td>
            <td>'.$data->no_identitas.'</td>
            <td>'.$data->jns_kelamin.'</td>
            <td>'.$data->gol_darah.'</td>
            <td>'.$data->agama.'</td>
            <td>'.$data->tempat_lahir.', '.$data->tanggal_lahir.'</td>
            <td>'.$data->alamat.'</td>
            <td>'.$data->no_telepon.'</td>
            <td>'.$data->pekerjaan.'</td>
            <td>'.$data->tanggal_rekam.'</td>
            <td>'.$data->kd_petugas.' / '.$petugas['nm_petugas'].'</td>';
        } ?>
  		</tbody>
  	</table>