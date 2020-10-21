<?php
	require ('../../db_login.php');
	$id = $_GET['nomorid'];
	$query = "DELETE FROM bahan WHERE id_bahan = '".$id."' ";
	// Execute the query
	$result = $db->query( $query );
	if (!$result)
	{
		 die ("Could not query the database: <br />". $db->error);
	}
	else
	{
		echo '<script language="javascript">alert("Bahan berhasil dihapus"); 
		document.location="daftar_bahan.php";</script>';
		$db->close();
		exit;
	}
?>
