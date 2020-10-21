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
	$email = $row->email;
	$notlp = $row->no_tlp;
		
  }
  else
  {
	$nama1 = test_input($_POST['nama']);
	if ($nama1 == "")
	{
		$valid_nama = FALSE;
	}
	else
	{
		$valid_nama = TRUE;
	}
	$email = test_input($_POST['email']);
	if ($email == '')
	{
		$valid_email = FALSE;
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$valid_email = FALSE;
	}
	else
	{
		$valid_email = TRUE;
	}
	$notlp = test_input($_POST['notlp']);
	if ($notlp == "")
	{
		$valid_notlp = FALSE;
	}
	elseif (!preg_match("/^[0-9+]*$/",$notlp))
	{
		$valid_notlp = FALSE;
	}
	else
	{
		$valid_notlp = TRUE;
	}
		
	if ($valid_nama && $valid_email && $valid_notlp)
	{
		$nama1 = $db->real_escape_string($nama1);
		$email= $db->real_escape_string($email);
		$notlp = $db->real_escape_string($notlp);
		
		$query1 = "UPDATE admin SET nama = '".$nama1."', email='".$email."',no_tlp = '".$notlp."' WHERE nip = '".$nip."'";	
		$_SESSION['nama'] = $nama1;
		
		$result = $db->query($query1);
		if (!$result) 
		{
			//die ("Could not query the database: <br />". $db->error);
            echo '<script language="javascript">alert("Data Gagal Diubah"); document.location="ubah_profil.php";</script>';
        } 
		else 
		{
            echo '<script language="javascript">alert("Data Berhasil Diubah"); document.location="ubah_profil.php";</script>';
        }
	}
	else
	{
		echo '<script language="javascript">alert("Data Gagal Diubah"); document.location="ubah_profil.php";</script>';	
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
             	<h2>Ubah Profil Admin</h2>
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
					<input class="form-control" type="text" name="nama" value="<?php echo $nama1;?>" required /></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">Email</label>
					<div class="col-sm-6">
					<input class="form-control" type="text" name="email" value="<?php echo $email;?>" required /></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">No. Telepon</label>
					<div class="col-sm-6">
					<input class="form-control" type="text" name="notlp" value="<?php echo $notlp;?>" required /></div>
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