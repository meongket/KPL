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

  $id = $_GET['nomorid'];

  $query = "SELECT * FROM alat WHERE id_alat = '".$id."' ";

  // Execute the query
  $result = $db->query( $query );
  if (!$result){
  	die ("Could not query the database: <br />". $db->error);
  }else{
  	$totalrow=$result->num_rows;
  	if ($totalrow!=0){
  		while ($row = $result->fetch_object()){
  			$nama = $row->nama_alat;
        	$ukuran = $row->ukuran;//null boleh
        	$merk = $row->merk;//null boleh
        	$jml = $row->jumlah;
        	$ket = $row->ket; //baik rusak dll
        }
        $result->free();
    }
  }


	// eksekusi tombol tambah
	if (isset($_POST['submit'])AND($id)) {

		//disaring supaya aman
		$nama=test_input($_POST['nama']);
		$ukuran=test_input($_POST['ukuran']);//mg or lt or kg
		$merk=test_input($_POST['merk']);//mg or lt or kg
		$jml=test_input($_POST['jml']); //ini harusnya angka sih
		$ket=test_input($_POST['ket']);//null boleh

		if(is_numeric($jml)){$validJml = TRUE;}

				 		
		// jika tidak ada kesalahan input
		if ($validJml) {
			//disaring lagi
			$nama=$db->real_escape_string($nama);
			$ukuran=$db->real_escape_string($ukuran);
			$merk=$db->real_escape_string($merk);
			$jml=$db->real_escape_string($jml);
			$ket=$db->real_escape_string($ket);

			$query = "UPDATE alat SET nama_alat='".$nama."', ukuran='".$ukuran."', merk='".$merk."', 
						jumlah='".$jml."', ket='".$ket."' WHERE id_alat='".$id."' ";

            //Execute the query
            $result = $db->query($query);
            if (!$result) {
              die ("Could not query the database: <br />". $db->error);
              echo '<script language="javascript"> document.location="daftar_instrumen.php";</script>';
            } else {
              echo '<script language="javascript">alert("Instrumen berhasil diedit"); document.location="daftar_instrumen.php";</script>';
            }
        }else{
        	echo '<script language="javascript">alert("Terdapat masalah dalam sistem mohon hubungi pihak yang bersangkutan"); document.location="daftar_instrumen.php";</script>';
        }	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit Instrumen</title>
</head>

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

        <div class="row">
          <div class="col-md-9">

          	  <div class="panel panel-default" style = "margin-left: 20px">
              <div class="panel-heading">
                  Edit Instrumen
              </div>
              <div class="panel-body">
              	<div class="row">
              	<div class="col-md-12">
              		<form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?nomorid='.$id;?>">
						<div class="form-group">
							<label class="col-sm-2">Nama Instrumen</label>
							<div class="col-sm-8">
							<input class="form-control" type="text" name="nama" <?php if(isset($nama)){echo 'value = "'.$nama.'"';}?> required /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Ukuran</label>
							<div class="col-sm-8">
							<input class="form-control" type="text" name="ukuran" <?php if(isset($ukuran)){echo 'value = "'.$ukuran.'"';}?> /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Merk</label>
							<div class="col-sm-4">
							<input class="form-control" type="text" name="merk" <?php if(isset($merk)){echo 'value = "'.$merk.'"';}?> /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Jumlah</label>
							<div class="col-sm-2">
							<input class="form-control" type="number" name="jml" <?php if(isset($jml)){echo 'value = "'.$jml.'"';}?> required /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Keterangan</label>
							<div class="col-sm-8">
							<input class="form-control" type="text" name="ket" <?php if(isset($ket)){echo 'value = "'.$ket.'"';}?> /></div>
						</div>
						<div class = "clearfix">
							<div class="form-group">
								<div class="col-md-10">
									<a href="daftar_instrumen.php" class="btn btn-danger pull-right">Kembali</a>
								</div>
								<div class="col-md-2">
									<input class="btn btn-success" type="submit" name="submit" value="Simpan">
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
