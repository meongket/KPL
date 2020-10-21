<?php
session_start();
if(isset($_SESSION['id_lab'])&&($_SESSION['nama']))
{
  //extraxt session
  $nip        = $_SESSION['nip'];
  $nama       = $_SESSION['nama'];
  $id_lab     = $_SESSION['id_lab'];
  $nama_lab   = $_SESSION['nama_lab'];
  $hak_akses  = $_SESSION['hak_akses'];

  //include halaman lain
  require ('../sidebar.php'); 
  require ('../db_login.php');
?>

<html>
<head>
	<title>Home</title>
</head>
<body>
	<div id="page-wrapper" >
      <div id="page-inner">

        	<hr />
    	<div class="row">
        	<div class="col-md-12">
             	<h2>Dashboard</h2>
             	<h3>Selamat Datang, <?php echo $nama;?></b>!</h3>
        	</div>
    	</div>
	  <!-- /. ROW  -->
    	<hr />
    <div class="row">
    	<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
					<i class="fa fa-thumb-tack"></i>
				</span>
				<div class="text-box" >
					<div class="text-muted">Alat Sedang Dipinjam</div>
				</div>
			</div>
		</div>

        <div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-red set-icon">
					<i class="fa fa-glass"></i>
				</span>
				<div class="text-box" >
					<div class="text-muted">Instrumen Sedang Dipinjam</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-blue set-icon">
					<i class="fa fa-tint"></i>
				</span>
				<div class="text-box" >
					<div class="text-muted">Bahan Habis</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- /. ROW  -->
	  </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER (inthe sidebar.php)  -->

<?php include_once('../footer.php') ?>

</body>

</html>

<?php } //untuk tutup session isset ?>