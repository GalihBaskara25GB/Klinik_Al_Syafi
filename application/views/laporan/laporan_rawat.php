<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=rawat-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table class="table table-striped table-hover" id="tabel">
  		<thead>
  			<th>No Rawat</th>
        <th>No Pendaftaran</th>
        <th>No Rekam Medis</th>
        <th>Nama Pasien</th>
        <th>Jenis Rawat</th>
        <th>Tgl Masuk</th>
        <th>Tgl Keluar</th>
  			<th>Diagnosa</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Petugas</th>
  		</thead>
  		<tbody>
  		<?php 
  		foreach ($dt_rawat->result() as $data){
        $koneksidb = mysqli_connect("localhost","root","","klinik_al_syafi");
        $qry = "SELECT pendaftaran.*, pasien.nm_pasien, pasien.nomor_rm FROM pendaftaran
                LEFT JOIN pasien ON pendaftaran.nomor_rm=pasien.nomor_rm 
                WHERE no_daftar='$data->no_daftar'";
        $myQry = mysqli_query($koneksidb,$qry)  or die ("Query salah");

        $qry2 = "SELECT nm_petugas FROM petugas WHERE kd_petugas='$data->kd_petugas'";
        $myQry2 = mysqli_query($koneksidb,$qry2)  or die ("Query salah");

        $kolomData = mysqli_fetch_array($myQry);
        $petugas = mysqli_fetch_array($myQry2);
            echo '
            <tr>
            <td>'.$data->no_rawat.'</td>
            <td>#'.$data->no_daftar.'</td>
            <td>'.$kolomData['nomor_rm'].'</td>
            <td>'.$kolomData['nm_pasien'].'</td>
            <td>Rawat '.$data->jenis_rawat.'</td>
            <td>'.$data->tgl_rawat.'</td>
            <td>'.$data->tgl_keluar.'</td>
            <td>'.$data->diagnosa.'</td>
            <td>'.$data->keterangan.'</td>
            <td>Rp. '.$data->total.'</td>
            <td>Rp. '.$data->uang_bayar.'</td>
            <td>'.$data->kd_petugas.'/ '.$petugas['nm_petugas'].'</td>';
        } ?>
  		</tbody>
  	</table>