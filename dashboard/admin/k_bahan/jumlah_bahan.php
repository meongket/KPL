<?php
session_start();
if(isset($_SESSION['id_lab'])&&($_SESSION['nama']))
{
  //extraxt session
  $nip        = $_SESSION['nip'];
  $id_lab     = $_SESSION['id_lab'];
  $nama_lab   = $_SESSION['nama_lab'];
  $hak_akses  = $_SESSION['hak_akses'];

  //include halaman lain
  require ('../../sidebar.php'); 
  require ('../../db_login.php');

  	if (isset($_POST["submit"]))
  	{
  		$banyak = $_POST['banyak'];
  		echo '<script language="javascript">document.location="tambah_bahan.php?banyak='.$banyak.'";</script>';
  	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Tambah Bahan</title>
</head>

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

        <div class="row">
          <div class="col-md-9">

          	  <div class="panel panel-default" style = "margin-left: 20px">
              <div class="panel-heading">
                  Tambah Bahan
              </div>
              <div class="panel-body">
              	<div class="row">
              	<div class="col-md-12">
              			<form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<label class="col-sm-2">Jumlah Data</label>
							<div class="col-sm-2">
							<input class="form-control" type="number" name="banyak" title ="Masukkan jumlah bahan yang ingin ditambahkan"/></div>
						</div>
						<div class = "clearfix">
							<div class="form-group">
								<div class="col-md-10">
									<a href="daftar_bahan.php" class="btn btn-danger pull-right">Kembali</a>
								</div>
								<div class="col-md-2">
									<input class="btn btn-success" type="submit" name="submit" value="Lanjutkan">
								</div>
							</div>
						</div>
					</form>
				</div>
				</div>
               
              </div>
            </div>
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

  <?php require ('../../footer.php'); ?>
     
</body>
</html>
<?php } ?>
