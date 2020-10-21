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

  $query = "SELECT * FROM bahan WHERE id_bahan = '".$id."' ";

  // Execute the query
  $result = $db->query( $query );
  if (!$result){
  	die ("Could not query the database: <br />". $db->error);
  }else{
  	$totalrow=$result->num_rows;
  	if ($totalrow!=0){
  		while ($row = $result->fetch_object()){
  			$katalog = $row->katalog;
  			$nama = $row->nama_bahan;
        	$sat = $row->satuan;
        	$jml = $row->jumlah;
        	$ket = $row->ket;
        }
        $result->free();
    }
  }


	// eksekusi tombol tambah
	if (isset($_POST['submit'])AND($id)) {

		//disaring supaya aman
		$katalog=test_input($_POST['katalog']);//null boleh
		$nama=test_input($_POST['nama']);
		$sat=test_input($_POST['satuan']);//mg or lt or kg
		$jml=test_input($_POST['jml']); //ini harusnya angka sih
		$ket=test_input($_POST['ket']);//null boleh

		if(is_numeric($jml)){$validJml = TRUE;}

				 		
		// jika tidak ada kesalahan input
		if ($validJml) {
			//disaring lagi
			$katalog=$db->real_escape_string($katalog);
			$nama=$db->real_escape_string($nama);
			$sat=$db->real_escape_string($sat);
			$jml=$db->real_escape_string($jml);
			$ket=$db->real_escape_string($ket);

			$query = "UPDATE bahan SET katalog='".$katalog."', nama_bahan='".$nama."', satuan='".$sat."', 
						jumlah='".$jml."', ket='".$ket."' WHERE id_bahan='".$id."' ";

            //Execute the query
            $result = $db->query($query);
            if (!$result) {
              die ("Could not query the database: <br />". $db->error);
              echo '<script language="javascript"> document.location="daftar_bahan.php";</script>';
            } else {
              echo '<script language="javascript">alert("Bahan berhasil diedit"); document.location="daftar_bahan.php";</script>';
            }
        }else{
        	echo '<script language="javascript">alert("Terdapat masalah dalam sistem mohon hubungi pihak yang bersangkutan"); document.location="daftar_bahan.php";</script>';
        }	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit Bahan</title>
</head>

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

        <div class="row">
          <div class="col-md-9">

          	  <div class="panel panel-default" style = "margin-left: 20px">
              <div class="panel-heading">
                  Edit Bahan
              </div>
              <div class="panel-body">
              	<div class="row">
              	<div class="col-md-12">
              			<form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?nomorid='.$id;?>">
						<div class="form-group">
							<label class="col-sm-2">Katalog</label>
							<div class="col-sm-6">
							<input class="form-control" type="text" name="katalog" <?php if(isset($katalog)){echo 'value = "'.$katalog.'"';}?>/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Nama Bahan</label>
							<div class="col-sm-8">
							<input class="form-control" type="text" name="nama" <?php if(isset($nama)){echo 'value = "'.$nama.'"';}?> required /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Jumlah</label>
							<div class="col-sm-2">
							<input class="form-control" type="text" pattern="[-+]?[0-9]*[.]?[0-9]+" title = "Gunakan '.' jika bilangan desimal" name="jml" <?php if(isset($jml)){echo 'value = "'.$jml.'"';}?> required /></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Satuan</label>
							<div class="col-sm-2">
								<select class="form-control" type="text" name="satuan" required/>
									<option></option>
									<option <?php if($sat == "mg"){echo 'selected = "Selected"';}?> value="mg">mg</option>
									<option <?php if($sat == "gram"){echo 'selected = "Selected"';}?> value="gram">gram</option>
									<option <?php if($sat == "kg"){echo 'selected = "Selected"';}?> value="kg">kg</option>
									<option <?php if($sat == "ml"){echo 'selected = "Selected"';}?> value="ml">ml</option>
									<option <?php if($sat == "lt"){echo 'selected = "Selected"';}?> value="lt">lt</option>
								</select>        
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2">Keterangan</label>
							<div class="col-sm-2">
								<select class="form-control" type="text" name="ket" required/>
									<option></option>
									<option <?php if($ket == "Padat"){echo 'selected = "Selected"';}?> value="Padat">Padat</option>
									<option <?php if($ket == "Cair"){echo 'selected = "Selected"';}?> value="Cair">Cair</option>
								</select>        
							</div>
						</div>
						<div class = "clearfix">
							<div class="form-group">
								<div class="col-md-10">
									<a href="daftar_bahan.php" class="btn btn-danger pull-right">Kembali</a>
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
