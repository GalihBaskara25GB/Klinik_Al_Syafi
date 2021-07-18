<?php
  $koneksidb = mysqli_connect("localhost","root","","klinik_al_syafi");

  # Baca noNota dari URL
  if(isset($id)){
    $noNota = $id;
  	
  	// Perintah untuk mendapatkan data dari tabel pendaftaran
  	$mySql = "SELECT pendaftaran.*, petugas.nm_petugas, pasien.nm_pasien FROM pendaftaran
  				LEFT JOIN petugas ON pendaftaran.kd_petugas = petugas.kd_petugas
          LEFT JOIN pasien ON pendaftaran.nomor_rm = pasien.nomor_rm 
  				WHERE no_daftar='$noNota'";
  	$myQry = mysqli_query($koneksidb,$mySql)  or die("Query salah".mysqli_error($koneksidb));
  	$kolomData = mysqli_fetch_array($myQry);
  }
  else {
  	echo "Nomor Pendaftaran tidak ditemukan";
  	exit;
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml" moznomarginboxes mozdisallowselectionprint>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&emsp;</title>
<link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	window.print();
	window.onfocus=function(){ window.close();}
</script>
</head>

<style type="text/css">
  body,td,th {
    font-family: Courier New, Courier, monospace;
  }
  body{
    margin:0px auto 0px;
    padding:3px;
    font-size:12px;
    color:#333;
    width:95%;
    background-position:top;
    background-color:#fff;
  }
  .table-list {
    clear: both;
    text-align: left;
    border-collapse: collapse;
    margin: 0px 0px 10px 0px;
    background:#fff;  
  }
  .table-list td {
    color: #333;
    font-size:12px;
    border-color: #fff;
    border-collapse: collapse;
    vertical-align: center;
    padding: 3px 5px;
    border-bottom:1px #CCCCCC solid;
  }
</style>

<body onLoad="">
<table class="table-list" width="500" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="5" align="center">
		<strong>KLINIK AL-SYAFI</strong>
        <center>Form- Diagnosa</center> </td>
  </tr>
  <tr>
    <td colspan="3"><strong>Tanggal :</strong></td>
    <td colspan="2"><?php echo $kolomData['tanggal_daftar']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><strong>No Antrian : </strong></td>
    <td width="28" bgcolor="#F5F5F5"><strong>No Daftar</strong></td>
    <td bgcolor="#F5F5F5"><strong>: <?php echo $kolomData['no_daftar']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3" align="right" rowspan="4"><center style="font-size: 36px"><?php echo ($kolomData['nomor_antri']); ?></center></td>
  </tr>
  <tr>
    <td><strong>No Rekam Medik </strong></td>
    <td><strong>: <?php echo ($kolomData['nomor_rm']); ?> </strong></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5"><strong>Nama</strong></td>
    <td bgcolor="#F5F5F5"><strong>: <?php echo ($kolomData['nm_pasien']); ?> </strong></td>
  </tr>
  <tr>
    <td><strong>Keluhan</strong></td>
    <td><strong>: <?php echo ($kolomData['keluhan']); ?> </strong></td>
  </tr>
  <tr>
    <td colspan="1" valign="top"><strong>Diagnosa :</strong></td>
    <td colspan="4" height="100"></td>
  </tr>
  <tr>
    <td colspan="1" valign="top"><strong>Tindakan :</strong></td>
    <td colspan="4" height="100"></td>
  </tr>
  <tr>
    <td colspan="1" valign="top"><strong>Obat&emsp;&emsp;&emsp;:</strong></td>
    <td colspan="4" height="100"></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Petugas :</strong> <?php echo $kolomData['nm_petugas']; ?></td>
  </tr>
</table>
</body>
</html>
