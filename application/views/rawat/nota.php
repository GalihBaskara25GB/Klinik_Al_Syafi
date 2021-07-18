<?php
$koneksidb = mysqli_connect("localhost","root","","klinik_al_syafi");

# Baca noNota dari URL
if(isset($id)){
  $noNota = $id;
	
	// Perintah untuk mendapatkan data dari tabel rawat
	$mySql = "SELECT rawat.*, petugas.nm_petugas FROM rawat
				LEFT JOIN petugas ON rawat.kd_petugas=petugas.kd_petugas 
				WHERE no_rawat='$noNota'";
	$myQry = mysqli_query($koneksidb,$mySql)  or die ("Query salah");
	$kolomData = mysqli_fetch_array($myQry);
}
else {
	echo "Nomor Nota (noNota) tidak ditemukan";
	exit;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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

<body onLoad="window.print()">
<table class="table-list" width="430" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td height="87" colspan="5" align="center">
		<strong>KLINIK AL-SYAFI</strong><br />
        <center>Pasuruan</center> </td>
  </tr>
  <tr>
    <td colspan="2"><strong>No Nota :</strong> <?php echo $kolomData['no_rawat']; ?></td>
    <td colspan="3" align="right"> <?php echo ($kolomData['tgl_keluar']); ?></td>
  </tr>
  <tr>
    <td width="32" bgcolor="#F5F5F5"><strong>No</strong></td>
    <td width="193" bgcolor="#F5F5F5"><strong>Obat/ Tindakan </strong></td>
    <td width="55" align="right" bgcolor="#F5F5F5"><strong>Harga@</strong></td>
    <td width="27" align="right" bgcolor="#F5F5F5"><strong>Qty</strong></td>
    <td width="97" align="right" bgcolor="#F5F5F5"><strong>Subtotal(Rp) </strong></td>
  </tr>
<?php
# Baca variabel
$totalBayar = 0; 
$jumlahObat = 0;  
$uangKembali=0;

# Menampilkan List Item obat yang dibeli untuk Nomor Transaksi Terpilih
$notaSql = "SELECT * from detail_rawat where no_rawat = '$noNota'";
$notaQry = mysqli_query($koneksidb,$notaSql)  or die ("Query list salah : ".mysqli_error($koneksidb));
$nomor  = 0;  
while ($notaData = mysqli_fetch_array($notaQry)) {
$nomor++;
	$subSotal 	= $notaData['jumlah'] * $notaData['harga'];
	$totalBayar	= $totalBayar + $subSotal;
	$jumlahObat = $jumlahObat + $notaData['jumlah'];
	$uangKembali= $kolomData['uang_bayar'] - $totalBayar;
?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $notaData['obat_tindakan']; ?></td>
    <td align="right">Rp. <?php echo $notaData['harga']; ?></td>
    <td align="right"><?php echo $notaData['jumlah']; ?></td>
    <td align="right">Rp. <?php echo $subSotal; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3" align="right"><strong>Total Belanja (Rp) : </strong></td>
    <td colspan="2" align="right" bgcolor="#F5F5F5">Rp. <?php echo $totalBayar; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><strong> Uang Bayar (Rp) : </strong></td>
    <td colspan="2" align="right">Rp. <?php echo $kolomData['uang_bayar']; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><strong>Uang Kembali (Rp) : </strong></td>
    <td colspan="2" align="right">Rp. <?php echo $uangKembali; ?></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Petugas :</strong> <?php echo $kolomData['nm_petugas']; ?></td>
  </tr>
</table>
</body>
</html>
