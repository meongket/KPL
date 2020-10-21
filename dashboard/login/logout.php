<?php
session_start();
unset($_SESSION['nip']);
unset($_SESSION['nama']);
unset($_SESSION['hak_akses']);
unset($_SESSION['id_lab']);
unset($_SESSION['nama_lab']);

session_destroy();
echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php'>";
?>