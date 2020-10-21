<?php
	require ('../../db_login.php');
	$id = $_GET['nomorid'];
	$query = "DELETE FROM alat WHERE id_alat = '".$id."' ";
	// Execute the query
	$result = $db->query( $query );
	if (!$result)
	{
		 die ("Could not query the database: <br />". $db->error);
	}
	else
	{
		echo '<script language="javascript">alert("Instrumen berhasil dihapus"); 
				document.location="daftar_instrumen.php";</script>';
		$db->close();
		exit;
	}
?>
