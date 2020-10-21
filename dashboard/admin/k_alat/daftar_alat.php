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
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Daftar Alat</title> <!-- +Lab Something -->
  <!--  fungsi untuk memunculkan konfirmasi mau dihapus atau tidak -->
  <script>
    function Konf_hapus(id){
        var result = confirm("Anda yakin ingin menghapus data ini?");
        if (result){
            document.location = "delete_alat.php?nomorid="+id;
        }
    }
  </script>
</head>

<body>
    <div id="page-wrapper" >
      <div id="page-inner">

                 <hr />
               
        <div class="row">
          <div class="col-md-12">

	        <a href="jumlah_alat.php"><button class="btn btn-success"><i class='fa fa-plus'></i> | Tambah </button></a>
            <!-- TABEL ADVANCE -->  
            <div class="panel panel-default" style = "margin-top: 10px">
              <div class="panel-heading">
                  Daftar Alat
              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead align='center'>
                          <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Alat</th>
                            <th style="text-align: center;">Ukuran</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Merk</th>
                            <th style="text-align: center;">Keterangan</th>
                            <th style="text-align: center;">Kelola</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            // Assign a query
                            $query = "SELECT * FROM alat WHERE id_lab='".$id_lab."' AND jenis='alat' ORDER BY id_alat";
                            // Execute the query
                            $result = $db->query( $query );
                            if(!$result){
                                 die('Could not connect to database : <br/>'.$db->error);
                            }
                            $i=1;
                            while($row = $result->fetch_object()){
                                 echo "<tr>";
                                     echo "<td>".$i."</td>";$i++; //untuk nomer
                                     echo "<td>".$row->nama_alat."</td>";
                                     echo "<td>".$row->ukuran."</td>";
                                     echo "<td>".$row->jumlah."</td>";  
                                     echo "<td>".$row->merk."</td>";  
                                     echo "<td>".$row->ket."</td>";            
                                     echo "<td align='center'>";
                                        echo "<a data-toggle='tooltip' title ='Hapus' href='#' onClick='Konf_hapus(".$row->id_alat.")'><i class='fa fa-trash-o'></i></a>"; echo " | ";
                                        echo "<a data-toggle='tooltip' title ='Edit Alat' href='edit_alat.php?nomorid=".$row->id_alat."'><i class='fa fa-edit'></i></a>";
                                     echo "</td>";
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
