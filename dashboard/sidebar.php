<?php
  $domain = 'http://localhost/siladek/dashboard/';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- ICON UNDIP-->
  <link rel="shortcut icon" href="<?=$domain.'/assets/img/Undip.png';?>" />
  <!-- BOOTSTRAP STYLES-->
  <link href="<?=$domain.'assets/css/bootstrap.css';?>" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?=$domain.'assets/css/font-awesome.css';?>" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="<?=$domain.'assets/css/custom.css';?>" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- TABLE STYLES-->
  <link href="<?=$domain.'assets/js/dataTables/dataTables.bootstrap.css';?>" rel="stylesheet" />
</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost/siladek/">SIL<i class="fa fa-flask"></i>DEK</a>
      </div>
      <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
        <a style="text-decoration: none; color:#fff; font-size:12px;">
          Lab
          <?php
            echo $nama_lab;
            echo " ( ".date("D, Y-m-d") . ")&nbsp;&nbsp;";
          ?>
        </a>
        <a href="<?=$domain.'login/logout.php';?>" class="btn btn-danger square-btn-adjust">Logout</a>
      </div>
    </nav>
    <!-- /. NAV TOP  -->
    
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center"><img src="<?=$domain.'assets/img/Undip.png';?>" class="user-image img-responsive"/></li>
          
          <!-- MENU -->
          <li>
            <a class="active-menu" href="<?=$domain.'admin/index.php';?>"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
          </li>
          <?php if(isset($hak_akses)){ ?>
            <li>
              <a href="#"><i class="fa fa-users"></i>Mahasiswa<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_user/daftar_mhs_kim.php';?>">Daftar Mahasiswa Kimia</a></li>
                  <li><a href="<?=$domain.'admin/k_user/daftar_mhs_nonkim.php';?>">Daftar Mahasiswa Non Kimia</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-tint"></i>Bahan<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_bahan/daftar_bahan.php';?>">Daftar Bahan</a></li>
                  <li><a href="<?=$domain.'admin/k_bahan/rwy_bahan.php';?>">Riwayat Pemakaian</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-thumb-tack"></i>Alat<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_alat/daftar_alat.php';?>">Daftar Alat</a></li>
                  <li><a href="<?=$domain.'admin/k_alat/pinjam_alat.php';?>">Sedang Dipinjam</a></li>
                  <li><a href="<?=$domain.'admin/k_alat/rwy_alat.php';?>">Riwayat Peminjam</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-glass"></i>Instrumen<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_ins/daftar_instrumen.php';?>">Daftar Instrumen</a></li>
                  <li><a href="<?=$domain.'admin/k_ins/pinjam_instrumen.php';?>">Sedang Dipinjam</a></li>
                  <li><a href="<?=$domain.'admin/k_ins/rwy_instrumen.php';?>">Riwayat Peminjam</a></li>
              </ul>
            </li>
            <li>
              <a href="<?=$domain.'admin/ubah_profil.php';?>"><i class="fa fa-user"></i>Ubah Profil</a> <!-- belum diedit -->
            </li>
          <?php }else{ ?>
            <li>
              <a href="mhs/"><i class="fa fa-sitemap"></i>Permintaan Bahan</a> <!-- belum diedit -->
            </li>
            <li>
              <a href="mhs/"><i class="fa fa-sitemap"></i>Peminjaman Alat & Instrumen</a> <!-- belum diedit -->
            </li>
          <?php } ?>
            <li>
                <a href="<?=$domain.'admin/ubah_pass.php';?>"><i class="fa fa-lock"></i>Ubah Password</a> <!-- belum diedit -->
            </li>

        </ul>          
      </div>
    </nav>
    <!-- /. NAV SIDE  -->
</body>