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
        $dataKatalog = $_POST['katalog'.$i];
        $dataNama = $_POST['nama_bahan'.$i];
        $dataSat = $_POST['sat'.$i];
        $dataJml = $_POST['jml'.$i];
        $dataKet = $_POST['ket'.$i];

        if ((!empty($dataNama)) && (!empty($dataSat)) && (!empty($dataKet)))
        {
          $query = "INSERT INTO bahan (id_bahan, id_lab, katalog, nama_bahan, satuan, jumlah, ket)
                    VALUES ('', '$id_lab', '$dataKatalog', '$dataNama','$dataSat','$dataJml','$dataKet') ";
          $result = $db->query($query);
          if (!$result)
          {
            die ("Could not query the database: <br />". $db->error);
            echo '<script language="javascript">document.location="daftar_bahan.php";</script>';
          }
        }else{
           echo '<script language="javascript">alert("Ada yang salah! Mohon hubungi pihak yang bersangkutan"); document.location="daftar_bahan.php";</script>';
        }
      }
      echo '<script language="javascript">alert("Proses pemasukan data bahan sukses!"); document.location="daftar_bahan.php";</script>';
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
          <div class="col-md-12">

              <div class="panel panel-default" style = "margin-left: 20px">
              <div class="panel-heading">
                  Tambah Bahan
              </div>
              <div class="panel-body">
                <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?banyak='.$banyak;?>">

                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th><center>Katalog</center></th>
                            <th><center>Nama Bahan</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Satuan</center></th>
                            <th><center>Keterangan</center></th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                            $n = $banyak; // membaca jumlah data
                            for ($i=1; $i<=$n; $i++)
                            {
                              echo '<tr>
                                      <td><center><input type="text" name="katalog'.$i.'"></center></td>
                                      <td><center><input type="text" name="nama_bahan'.$i.'" required></center></td>
                                      <td><center><input type="text" name="jml'.$i.'" pattern="[-+]?[0-9]*[.]?[0-9]+" title = "Gunakan '.' jika bilangan desimal" required></center></td>
                                      <td><center><select type="text" name="sat'.$i.'" required/>
                                          <option></option>
                                          <option value="mg">mg</option>
                                          <option value="gram">gram</option>
                                          <option value="kg">kg</option>
                                          <option value="ml">ml</option>
                                          <option value="lt">lt</option>
                                      </select></center></td>
                                      <td><center><select type="text" name="ket'.$i.'" required/>
                                          <option></option>
                                          <option value="Padat">Padat</option>
                                          <option value="Cair">Cair</option>
                                      </select></center></td>
                                    </tr>';
                            }
                          ?>
                        </tbody>
                      </table>
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

