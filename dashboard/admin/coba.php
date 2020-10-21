<?php
 include ('../db_login.php'); 
  $id_lab = 1;
  $hak_akses=1;
  $nama_lab="Lab Biokimia";
  $domain = 'http://localhost/siladek/dashboard/';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Bahan</title> <!-- +Lab Something -->
  <!-- ICON UNDIP-->
  <link href="<?=$domain.'assets/img/Undip.png';?>" rel="shortcut icon"/>
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
          <?php
            echo $nama_lab;
            echo " ( ".date("D, Y-m-d") . " ". date("h:ia").")&nbsp;&nbsp;";
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
                  <li><a href="<?=$domain.'admin/k_mhs/daftar_mhs_kim.php';?>">Daftar Mahasiswa Kimia</a></li>
                  <li><a href="<?=$domain.'admin/k_mhs/daftar_mhs_nonkim.php';?>">Daftar Mahasiswa Non Kimia</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-tint"></i>Bahan<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_bahan/daftar_bahan.php';?>">Daftar Bahan</a></li>
                  <li><a href="<?=$domain.'admin/k_bahan/rwy_bahan.php';?>">Riwayat</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-thumb-tack"></i>Alat<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_alat/daftar_alat.php';?>">Daftar Alat</a></li>
                  <li><a href="<?=$domain.'admin/k_alat/pinjam_alat.php';?>">Sedang Dipinjam</a></li>
                  <li><a href="<?=$domain.'admin/k_alat/rwy_alat.php';?>">Riwayat</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-glass"></i>Instrumen<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                  <li><a href="<?=$domain.'admin/k_ins/daftar_instrumen.php';?>">Daftar Instrumen</a></li>
                  <li><a href="<?=$domain.'admin/k_ins/pinjam_instrumen.php';?>">Sedang Dipinjam</a></li>
                  <li><a href="<?=$domain.'admin/k_ins/rwy_instrumen.php';?>">Riwayat</a></li>
              </ul>
            </li>
            <li>
              <a href="admin/"><i class="fa fa-user"></i>Ubah Profil</a> <!-- belum diedit -->
            </li>
          <?php }else{ ?>
            <li>
              <a href="mhs/"><i class="fa fa-sitemap"></i>Peminjaman</a> <!-- belum diedit -->
            </li>
          <?php } ?>
            <li>
                <a href="admin/"><i class="fa fa-lock"></i>Ubah Password</a> <!-- belum diedit -->
            </li>

        </ul>          
      </div>
    </nav>
    <!-- /. NAV SIDE  -->
    
    <div id="page-wrapper" >
      <div id="page-inner">

                 <hr />
               
        <div class="row">
          <div class="col-md-12">
            
            <a href="tambah_bahan.php"><button class="btn btn-success"><i class='fa fa-plus'></i> | Tambah </button></a>
            <!-- TABEL ADVANCE -->  
            <div class="panel panel-default" style = "margin-top: 10px">
              <div class="panel-heading">
                  Daftar Bahan
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead align='center'>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Katalog</th>
                          <th style="text-align: center;">Nama Bahan</th>
                          <th style="text-align: center;">Jenis</th>
                          <th style="text-align: center;">Packing</th>
                          <th style="text-align: center;">Jumlah</th>
                          <th style="text-align: center;">Merk</th>
                          <th style="text-align: center;">Keterangan</th>
                          <th style="text-align: center;">Kelola</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // Assign a query
                      $query = "SELECT * FROM bahan WHERE id_lab='".$id_lab."' ORDER BY katalog";
                      // Execute the query
                      $result = $db->query( $query );
                      if(!$result){
                        die('Could not connect to database : <br/>'.$db->error);
                      }
                      $i=1;
                      while($row = $result->fetch_object()){
                        echo "<tr>";
                          echo "<td>".$i."</td>";$i++; //untuk nomer
                          echo "<td>".$row->katalog."</td>";
                          echo "<td>".$row->nama_bahan."</td>";
                          echo "<td>".$row->jenis."</td>";
                          echo "<td>".$row->packing."</td>";
                          echo "<td>".$row->jumlah."</td>";  
                          echo "<td>".$row->merk."</td>";  
                          echo "<td>".$row->ket."</td>";            
                          echo "<td align='center'>";
                            echo "<a data-toggle='tooltip' title ='Hapus' href='#' onClick='Konf_hapus(".$row->id_bahan.")'><i class='fa fa-trash-o'></i></a>"; echo " | ";
                            echo "<a data-toggle='tooltip' title ='Lihat Profil' href='detail_bahan.php?nomorid=".$row->id_bahan."'><i class='fa fa-bars'></i></a>";
                          echo "</td>";
                        echo "</tr>";
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /. TABEL ADVANCE -->  

          </div>
          <!-- /. COL MD 12 -->  
        </div>
        <!-- /. ROW  -->       
      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER (inthe sidebar.php)  -->

  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="<?=$domain.'assets/js/jquery-1.10.2.js';?>"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="<?=$domain.'assets/js/bootstrap.min.js';?>"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="<?=$domain.'assets/js/jquery.metisMenu.js';?>"></script>
  <!-- DATA TABLE SCRIPTS -->
  <script src="<?=$domain.'assets/js/dataTables/jquery.dataTables.js';?>"></script>
  <script src="<?=$domain.'assets/js/dataTables/dataTables.bootstrap.js';?>"></script>
  <script>
    $(document).ready(function () {
      $('#dataTables-example').dataTable();
    });
  </script>
  <!-- CUSTOM SCRIPTS -->
  <script src="<?=$domain.'assets/js/custom.js';?>"></script>
     
</body>
</html>
