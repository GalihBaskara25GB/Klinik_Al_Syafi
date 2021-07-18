<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=penjualan-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

    <table>
      <thead>
        <th>No Penjualan</th>
        <th>Tgl Penjualan</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Petugas</th>
      </thead>
      <tbody>
      <?php

      foreach ($dt_penjualan->result() as $data){

        $koneksidb = mysqli_connect("localhost","root","","klinik_al_syafi");
        $qry = "SELECT * FROM detail_penjualan WHERE no_penjualan='$data->no_penjualan'";
        $myQry = mysqli_query($koneksidb,$qry)  or die ("Query salah penjulan");

        $qry2 = "SELECT nm_petugas FROM petugas WHERE kd_petugas='$data->kd_petugas'";
        $myQry2 = mysqli_query($koneksidb,$qry2)  or die ("Query salah");

        $kolomData = mysqli_fetch_array($myQry);
        $petugas = mysqli_fetch_array($myQry2);
        
            echo '
            <tr>
            <td>'.$data->no_penjualan.'</td>
            <td>'.$data->tgl_penjualan.'</td>
            <td>Rp. '.$data->total.'</td>
            <td>Rp. '.$data->uang_bayar.'</td>
            <td>'.$data->kd_petugas.'/ '.$petugas['nm_petugas'].'</td>';
        } ?>
      </tbody>
    </table>
