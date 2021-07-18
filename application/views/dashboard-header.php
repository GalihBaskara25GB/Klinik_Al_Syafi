<!DOCTYPE html>

<?php
  if($this->session->userdata('status') == 'loggedin'){
  
    $user = $this->session->userdata('username');
    $level = $this->session->userdata('level');
    $kdpet = $this->session->userdata('kd_petugas');

    //---Levelling
    //lv 1 => Admin, lv 2 => Apoteker, lv 3 => Dokter, lv 4 => Petugas
    $menuDisStart1 = '';
    $menuDisEnd1 = '';
    $menuDisStart2 = '';
    $menuDisEnd2 = '';
    $menuDisStart3 = '';
    $menuDisEnd3 = '';
    $menuDisStart4 = '';
    $menuDisEnd4 = '';

    if($level=='Administrator'){
        $menuDisStart1 = '';
        $menuDisEnd1 = '';
    
    } else if($level=='Apoteker'){
        $menuDisStart2 = '<!--';
        $menuDisEnd2 = '-->';
    
    } else if($level=='Dokter'){
        $menuDisStart3 = '<!--';
        $menuDisEnd3 = '-->';
    
    } else{
        $menuDisStart4 = '<!--';
        $menuDisEnd4 = '-->';
    }


  } else {
    redirect('App/index');
  }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Klinik Al-Syafi">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/system/favicon.png">

    <title>Klinik Al-Syafi</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap4.css" rel="stylesheet">

  </head>

  <body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Klinik Al-Syafi</h3>
            <strong>AS</strong>
        </div>
        <ul class="list-unstyled components">
            <?php echo $menuDisStart2.$menuDisStart3 ?>
            <li class="<?php if(isset($home_menu)) echo $home_menu?>">
                <a href="<?php echo base_url().'Home' ?>">
                    <i class="fas fa-home"></i>Home
                </a>
            </li>

            <hr>

            <li class="<?php if(isset($pendaftaran_menu)) echo $pendaftaran_menu?>">
                <a href="<?php echo base_url() ?>Pendaftaran">
                    <i class="fas fa-id-badge"></i>Pendaftaran
                </a>
            </li>
            <?php echo $menuDisEnd2.$menuDisEnd3 ?>

            <?php echo $menuDisStart4.$menuDisStart3 ?>
            <li class="<?php if(isset($penjualan_menu)) echo $penjualan_menu?>">
                <a href="<?php echo base_url() ?>Penjualan">
                    <i class="fas fa-shopping-cart"></i>Penjualan
                </a>
            </li>
            <li class="<?php if(isset($rawat_menu)) echo $rawat_menu?>">
                <a href="<?php echo base_url() ?>Rawat">
                    <i class="fas fa-bed"></i>Perawatan
                </a>
            </li>
            <?php echo $menuDisEnd4.$menuDisEnd3 ?>

            <li class="<?php if(isset($tindakan_menu)) echo $tindakan_menu?>">
                <a href="<?php echo base_url() ?>Tindakan">
                    <i class="fas fa-tag"></i>Tindakan
                </a>
            </li>

            <hr>

            <?php echo $menuDisStart3 ?>
            <li class="<?php if(isset($petugas_menu)) echo $petugas_menu?>">
                <a href="<?php echo base_url() ?>Petugas">
                    <i class="fas fa-users"></i>Petugas
                </a>
            </li>

            <li class="<?php if(isset($dokter_menu)) echo $dokter_menu?>">
                <a href="<?php echo base_url() ?>Dokter">
                    <i class="fas fa-headphones"></i>Dokter
                </a>
            </li>
            <?php echo $menuDisEnd3 ?>

            <li class="<?php if(isset($pasien_menu)) echo $pasien_menu?>">
                <a href="<?php echo base_url() ?>Pasien">
                    <i class="fas fa-wheelchair"></i>Pasien
                </a>
            </li>
            <li class="<?php if(isset($obat_menu)) echo $obat_menu?>">
                <a href="<?php echo base_url() ?>Obat">
                    <i class="fas fa-circle"></i>Obat
                </a>
            </li>
            <li class="<?php if(isset($penyakit_menu)) echo $penyakit_menu?>">
                <a href="<?php echo base_url() ?>Penyakit">
                    <i class="fas fa-heartbeat"></i>Penyakit
                </a>
            </li>

            <hr>
            <?php echo $menuDisStart2.$menuDisStart3.$menuDisStart4 ?>
            <li class="<?php if(isset($laporan_menu)) echo $laporan_menu?>">
                <a href="<?php echo base_url() ?>Laporan">
                    <i class="fas fa-copy"></i>Laporan
                </a>
            </li>
            <hr>
            <?php echo $menuDisEnd2.$menuDisEnd3.$menuDisEnd4 ?>

            
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content" style="padding: 0;">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="margin: auto;">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-bars"></i>
                </button> &emsp;
                </li>

                <li class="navbar-brand">
                    <a class="nav-link" href="#">
                        <?php echo $title ?> 
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto drop">
                <li class="nav-item dropdown">
                    <a href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #d0d0d1">
                        <?php echo $this->session->userdata('username') ?>&nbsp;
                        <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/1.jpg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url().'Profil/index'?> ">
                            <i class="fas fa-edit"></i>&emsp;Change Profile
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url().'App/logout'?>">
                            <i class="fas fa-sign-out-alt"></i>&emsp;Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        
    

    
