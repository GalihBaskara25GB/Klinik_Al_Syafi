<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=obat-laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
  	<table>
      <thead>
        <th>Kode Obat</th>
        <th>Nama</th>
        <th>Hrg Modal</th>
        <th>Hrg Jual</th>
        <th>Stok</th>
        <th>Keterangan</th>
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
            <td>'.$data->keterangan.'</td>';
        } ?>
      </tbody>
    </table>