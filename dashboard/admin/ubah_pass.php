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
  
  if (!isset ($_POST['submit']))
  {
	$query = "SELECT * FROM admin WHERE nip = '$nip'";
	$result = mysqli_query($db,$query); 
	if (!$result)
	{
		die ("Could not query the database: <br />". mysqli_error($db));
	}
		
	$row = $result->fetch_object();
	$nip = $row->nip;
	$nama1 = $row->nama;
		
  }
  else
  {
	$passLama = test_input($_POST['passLama']);
	if ($passLama == "")
	{
		$valid_passLama = FALSE;
	}
	else
	{
		$valid_passLama = TRUE;
	}
	
	$passBaru = test_input($_POST['passBaru']);
	if ($passBaru == '')
	{
		$valid_passBaru = FALSE;
	}
	else
	{
		$valid_passBaru = TRUE;
	}
	
	$passBaru1 = test_input($_POST['passBaru1']);
	if ($passBaru1 == "")
	{
		$valid_passBaru1 = FALSE;
	}
	else
	{
		$valid_passBaru1 = TRUE;
	}
		
	if ($valid_passLama && $valid_passBaru && $valid_passBaru1)
	{
		$query1 = "SELECT password FROM admin WHERE nip = '".$nip."'";
		$result1 = mysqli_query($db,$query1); 
		if (!$result1)
		{
			die ("Could not query the database: <br />". mysqli_error($db));
		}	
		$row = $result1->fetch_object();
		$passDb = $row->password;
		
		$passDb = $db->real_escape_string($passDb);
		$passLama = $db->real_escape_string($passLama);
		$passBaru = $db->real_escape_string($passBaru);
		$passBaru1 = $db->real_escape_string($passBaru1);
		
		if ($passDb == $passLama)
		{
			if ($passBaru == $passBaru1)
			{
				$query2 = "UPDATE admin SET password = '".$passBaru."' WHERE nip = '".$nip."'";
				$result2 = mysqli_query($db,$query2); 
				if (!$result2)
				{
					echo '<script language="javascript">alert("Data Gagal Diubah"); document.location="ubah_pass.php";</script>';
				}
				else	
				{
					 echo '<script language="javascript">alert("Data Berhasil Diubah"); document.location="ubah_pass.php";</script>';
				}
			}
			else	
			{
				echo '<script language="javascript">alert("Password Baru dan Konfirmasi Password Tidak Sama"); document.location="ubah_pass.php";</script>';
			}
		}
		else	
		{
			echo '<script language="javascript">alert("Password Lama Salah"); document.location="ubah_pass.php";</script>';
		}
	}
	else	
	{
		echo '<script language="javascript">alert("Password Salah"); document.location="ubah_pass.php";</script>';
	}
  }
  
		
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
             	<h2>Ubah Password Admin</h2>
             	<!--h3><?php echo $nama;?></b></h3-->
        	</div>
    	</div>
	  <!-- /. ROW  -->
    	<hr />
    <div class="row">
    	<div class="col-md-12">
			<form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
				<div class="form-group">
					<label class="col-sm-2">NIP</label>
					<div class="col-sm-6">
					<label><?php echo $nip;?></label></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Nama</label>
					<div class="col-sm-6">
					<label><?php echo $nama1;?></label></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Password Lama</label>
					<div class="col-sm-6">
					<input class="form-control" type="password" name="passLama"  required /></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Password Baru</label>
					<div class="col-sm-6">
					<input class="form-control" type="password" name="passBaru" required /></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Konfirmasi Password Baru</label>
					<div class="col-sm-6">
					<input class="form-control" type="password" name="passBaru1" required /></div>
				</div>
				<div class = "clearfix">
					<div class="form-group">
						<div class="col-md-4">
							<a href="index.php" class="btn btn-danger pull-right">Kembali</a>
						</div>
						<div class="col-md-8">
							<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						</div>
					</div>
				</div>
			</form>
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