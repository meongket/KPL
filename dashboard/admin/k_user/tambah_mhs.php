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

    // eksekusi tombol tambah
    if (isset($_POST['upload'])) {
      // menghubungkan dengan library excel reader
      include ('excel_import/excel_reader2.php');

      // upload file xls
      $target = basename($_FILES['filepegawai']['name']);
      move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

      // beri permisi agar file xls dapat di baca
      chmod($_FILES['filepegawai']['name'],0777);

      // mengambil isi file xls
      $data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
      // menghitung jumlah baris data yang ada
      $jumlah_baris = $data->rowcount($sheet_index=0);

      // jumlah default data yang berhasil di import
      $berhasil = 0;
      for ($i=2; $i<=$jumlah_baris; $i++){
        // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
        $dataNim      = $data->val($i, 1);
        $dataNama     = $data->val($i, 2);
        $dataAngkatan = $data->val($i, 3);
        $dataStatus   = "Aktif";

        if($dataNim != "" && $dataNama != "" && $dataAngkatan != ""){

          // input data ke database (table data_pegawai)
          $query = "INSERT INTO mahasiswa (nim, id_lab, nama, password, angkatan, statuss)
                      VALUES ('$dataNim', '$id_lab', '$dataNama','$dataNim','$dataAngkatan','$dataStatus') ";
          $result = $db->query($query);
          if (!$result)
          {
              die ("Could not query the database: <br />". $db->error);
              echo '<script language="javascript">document.location="daftar_mhs_kim.php";</script>';
          }else{
            $berhasil++;
          }
        }
      }

      // hapus kembali file .xls yang di upload tadi
      unlink($_FILES['filepegawai']['name']);

      // alihkan halaman ke daftar_mhs_kim.php
       echo '<script language="javascript">alert(" '.$berhasil.' Data berhasil di import"); document.location="daftar_mhs_kim.php";</script>';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Tambah Mahasiswa</title>
</head> 

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

        <div class="row">
          <div class="col-md-12">
            <center>
              <h4>Langkah 1</h4>
               Download template terlebih dahulu melalui tombol di bawah ini <br/><br/>
               <button class="btn btn-info"><i class="fa fa-download" href="excel_import/template_mhs.xls" download></i> Download Template</button>

              <br/>
              <hr  />

              <h4>Langkah 2</h4>
              Lakukan pengisian nilai berdasarkan file template yang telah ditentukan.
            
            
            <br/>
            <hr  />

            <h4>Langkah 3</h4>
            Upload file yang berisi data mahasiswa. File yang diupload harus merupakan file Excel dengan ekstensi  *.xls (Excel 97-2003 Workbook)

            <br/><br/>
            </center>
          </div>
        </div>
            
        <div class="row">
          <div class="col-md-5">
            </div>
            
              <div class="col-md-7">

           
            <form  method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                  <input name="filepegawai" type="file" required>

                <br/>
                
                <a href="daftar_mhs_kim.php" class="btn btn-danger pull-right">Kembali</a>    
                <input class="btn btn-primary" type="submit" name="upload" value="Import">
                   
            </form>
            
        </div>
        
           <br/>
            <hr  />  
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

