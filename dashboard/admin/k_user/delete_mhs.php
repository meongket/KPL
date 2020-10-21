<?php
	require ('../../db_login.php');
	$id = $_GET['nomorid'];
	$query = "DELETE FROM mahasiswa WHERE nim = '".$id."' ";
	// Execute the query
	$result = $db->query($query);
	if (!$result)
	{
		 die ("Could not query the database: <br />". $db->error);
	}
	else
	{
		echo '<script language="javascript">alert("Akun Mahasiswa berhasil dihapus"); document.location="daftar_mhs_kim.php";</script>';
		$db->close();
		exit;
	}
?>
