<?php
	session_start(); // ini wajib hukumnya di setiap file untuk web, gunanya untuk memulai session
	require_once('../db_login.php'); // melampirkan/memasukkan file db_login.php
	/* 
	  nb : 
	  biasanya require_once('namafile') berada diatas file agar ter"loading" duluan
	*/
	if(isset($_POST['login'])){//harus dikasih kondisi ini agar tidak langsung menerapkan kodingan di dalamnya
		// Ambil Data dari Form
		$nip = $_POST['nip']; // ini untuk mengambil nip yang diinput user lalu nip tsb disimpan di variabel $nip
		$password = $_POST['password']; //md5($_POST['password']); //kalo ini untuk ambil passwordnya dan nyimpen di $password
		
		
		//Query
		$query = "SELECT labo.id_lab, labo.nama_lab, nama, hak_akses, statuss  
					FROM admin LEFT JOIN lab labo USING(id_lab) 
					WHERE nip = '$nip' and password = '$password' ";
		
		// Menjalankan Query
		$result = mysqli_query($db,$query); //$query didapat dari atas, $db didapat dari lampiran file db_login.php
		if (!$result)
		{
			die ("Could not query the database: <br />". mysqli_error($db));
		}
		
		$row = $result->fetch_object(); //mengambil hasil query dengan fetch_object, lalu hasilnya dimasukkan ke variabel $row
		$match = mysqli_num_rows($result); //ini untuk menghitung data yang terambil oleh fetch_object

		//Memilah-milah hasil dari $row yang tercampur ke variabel-variabel yang terpisah
		$id_lab = $row->id_lab;
		$nama_lab = $row->nama_lab;
		$nama = $row->nama;
		$hak_akses = $row->hak_akses;
		$status = $row->statuss;
		
		//$status_match = "Aktif";
		if ($match == 1) //kode ini untuk memastikan bahwa fetch_object berhasil mengambil hasil query, karena apabila $match nya selain 1, berarti ada error
		{
			if ($hak_akses == 1) //untuk kadep
			{
				if ($status == "Aktif")
				{
					//membuat session yang kira-kira bakal dibutuhin selama si user lagi login di web
					$_SESSION['nip']		= $nip;
					$_SESSION['nama'] 	   	= $nama;
					$_SESSION['hak_akses'] 	= $hak_akses;
					$_SESSION['id_lab'] 	= $id_lab;
					$_SESSION['nama_lab']	= $nama_lab;
					header("Location:../admin/index.php"); //meneruskan ke file home.php (nb : diisi sesuai letak file)
				}
				else //jaga-jaga apabila status nya "tidak aktif"
				{
					echo '<script language="javascript">alert("Akun Anda telah di Nonaktifkan"); document.location="index.html";</script>';	
				}
				
			}
			else if ($hak_akses == 2) //untuk kalab
			{
				if ($status == "Aktif")
				{
					//membuat session yang kira-kira bakal dibutuhin selama si user lagi login di web
					$_SESSION['nip']		= $nip;
					$_SESSION['nama'] 	   	= $nama;
					$_SESSION['hak_akses'] 	= $hak_akses;
					$_SESSION['id_lab'] 	= $id_lab;
					$_SESSION['nama_lab']	= $nama_lab;
					header("Location:../admin/index.php"); //meneruskan ke file home.php (nb : diisi sesuai letak file)
				}
				else //jaga-jaga apabila status nya "tidak aktif"
				{
					echo '<script language="javascript">alert("Akun Anda telah di Nonaktifkan"); document.location="index.html";</script>';	
				}
			}
			else if ($hak_akses == 3) //untuk admin lab
			{
				if ($status == "Aktif")
				{
					//membuat session yang kira-kira bakal dibutuhin selama si user lagi login di web
					$_SESSION['nip']		= $nip;
					$_SESSION['nama'] 	   	= $nama;
					$_SESSION['hak_akses'] 	= $hak_akses;
					$_SESSION['id_lab'] 	= $id_lab;
					$_SESSION['nama_lab']	= $nama_lab;
					header("Location:../admin/index.php"); //meneruskan ke file home.php (nb : diisi sesuai letak file)
				}
				else //jaga-jaga apabila status nya "tidak aktif"
				{
					echo '<script language="javascript">alert("Akun Anda telah di Nonaktifkan"); document.location="index.html";</script>';	
				}
			}
		}
		else //untuk mahasiswa, karena mahasiswa beda tabel jadi tidak bisa disamakan
		{
			//dinamakan $query1 karena $query sudah dipakai di atas
			$query1 = "SELECT * FROM mahasiswa WHERE nim = '$nip' and password = '$password' ";
		
			// Menjalankan Query1
			$result1 = mysqli_query($db,$query1);
			if (!$result1)
			{
				die ("Could not query the database: <br />". mysqli_error($db));
			}
			
			//$row, $result, dsb sudah dipakai diatas jadi ditambahin "1" biar ga sama
			$row1 = $result1->fetch_object();
			$match1 = mysqli_num_rows($result1);
			$hak_akses1 = $row1->hak_akses;
			if ($match1 == 1)
			{
				//membuat session yang kira-kira bakal dibutuhin selama si user lagi login di web
				$_SESSION['nim'] = $nip;
				$_SESSION['nama'] = $row1->nama;
				//harusnya nambah id lab
				header("Location:../mahasiswa/home.php");	
			}
			else
			{
				echo '<script language="javascript">alert("Kombinasi username dan password salah. Silahkan inputkan kembali"); document.location="index.html";</script>';	
			}
		}
	}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $site_name ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
		<link rel="shortcut icon" href="../assets/img/Undip.png"/>
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
	body{
		background-color: #076960;
	}

	.vertical-offset-100{
		padding-top:100px;
	}
	</style>
</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Silakan Masuk</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST">
                    <fieldset>
						<!-- <?php if(isset($gagal)) echo '<div class="form-group"><span class="label label-warning">'.$gagal.'</span></div>' ?> -->
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Nip / Nim" name="nip" type="text" value="<?php if(isset($email)) echo $email; ?>"/>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password"/>
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login"/>
						<div>
			    		<a href="forget.php">lupa password?</a>
			    		</div>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

