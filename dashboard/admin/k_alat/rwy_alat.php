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
  require ('../../sidebar.php'); 
  require ('../../db_login.php');
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
             	<h2> Riwayat Peminjaman Alat </h2>
             	<!--h3><?php echo $nama;?></b></h3-->
        	</div>
    	</div>
	  <!-- /. ROW  -->
    	<hr />
    <div class="row">
          <div class="col-md-12">
            <!-- TABEL ADVANCE -->  
            <div class="panel panel-default" style = "margin-top: 10px">
              <div class="panel-heading">
                  Riwayat Peminjaman Alat
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead align='center'>
                      <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Alat</th>
                          <th style="text-align: center;">NIM</th>
                          <th style="text-align: center;">Waktu Pinjam</th>
                          <th style="text-align: center;">Waktu Kembali</th>
                          <th style="text-align: center;">Keg</th>
						  <th style="text-align: center;">Status</th>
						  <th style="text-align: center;">Ket</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // Assign a query
                      $query = "SELECT pinjam_alat.id_alat as id_alat, pinjam_alat.nim as nim,pinjam_alat.waktu_pinjam as waktu_pinjam,
					  pinjam_alat.waktu_kembali as waktu_kembali, pinjam_alat.keg as keg, pinjam_alat.statuss as status, pinjam_alat.ket as ket, alat.nama_alat as nama FROM (pinjam_alat LEFT JOIN alat 
					  ON pinjam_alat.id_alat = alat.id_alat) WHERE alat.jenis='alat' ";
                      // Execute the query
                      $result = $db->query( $query );
                      if(!$result){
                        die('Could not connect to database : <br/>'.$db->error);
                      }
                      $i=1;
                      while($row = $result->fetch_object()){
                        echo "<tr>";
							echo "<td>".$i."</td>";$i++; //untuk nomer
							echo "<td>".$row->nama."</td>";
							echo "<td>".$row->nim."</td>";
							echo "<td>".$row->waktu_pinjam."</td>";  
							echo "<td>".$row->waktu_kembali."</td>";
							echo "<td>".$row->keg."</td>";
							echo "<td>".$row->status."</td>";
							echo "<td>".$row->ket."</td>";
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

  <?php require ('../../footer.php'); ?>
     
</body>

</html>

<?php } //untuk tutup session isset ?>