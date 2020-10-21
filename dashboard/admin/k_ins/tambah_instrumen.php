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

    $banyak = $_GET['banyak'];

    if (isset($_POST["submit"]))
    {
      $n = $_GET['banyak']; // membaca jumlah data
      $j=1;
      //mulai looping
      for ($i=1; $i<=$n; $i++)
      {
        $dataNama = $_POST['nama_instruman'.$i];
        $dataUkuran = $_POST['ukuran'.$i];
        $dataMerk= $_POST['merk'.$i];
        $dataJml = $_POST['jml'.$i];
        $dataKet = $_POST['ket'.$i];

        if ((!empty($dataNama)) && (!empty($dataJml)))
        {
          $query = "INSERT INTO alat (id_alat, jenis, id_lab, nama_alat, ukuran, merk, jumlah, ket)
                    VALUES ('', 'instrumen','$id_lab', '$dataNama', '$dataUkuran','$dataMerk','$dataJml','$dataKet') ";
          $result = $db->query($query);
          if (!$result)
          {
            die ("Could not query the database: <br />". $db->error);
            echo '<script language="javascript">document.location="daftar_instrumen.php";</script>';
          }
        }else{
           echo '<script language="javascript">alert("Ada yang salah! Mohon hubungi pihak yang bersangkutan"); document.location="daftar_instrumen.php";</script>';
        }
      }
      echo '<script language="javascript">alert("Proses pemasukan data alat sukses!"); document.location="daftar_instrumen.php";</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Tambah Instrumen</title>
</head> 

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

        <div class="row">
          <div class="col-md-12">

              <div class="panel panel-default" style = "margin-left: 20px">
              <div class="panel-heading">
                  Tambah Instrumen
              </div>
              <div class="panel-body">
                <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?banyak='.$banyak;?>">

                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th><center>Nama Instrumen</center></th>
                            <th><center>Ukuran</center></th>
                            <th><center>Merk</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Keterangan</center></th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                            $n = $banyak; // membaca jumlah data
                            for ($i=1; $i<=$n; $i++)
                            {
                              echo '<tr>
                                      <td><center><input type="text" name="nama_instruman'.$i.'" required></center></td>
                                      <td><center><input type="text" name="ukuran'.$i.'"></center></td>
                                      <td><center><input type="text" name="merk'.$i.'"></center></td>
                                       <td><center><input type="number" name="jml'.$i.'" required></center></td>
                                      <td><center><input type="text" name="ket'.$i.'"></center></td>
                                    </tr>';
                            }
                          ?>
                        </tbody>
                      </table>
                      <div class = "clearfix">
                        <div class="form-group">
                          <div class="col-md-10">
                            <a href="daftar_alat.php" class="btn btn-danger pull-right">Kembali</a>
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

