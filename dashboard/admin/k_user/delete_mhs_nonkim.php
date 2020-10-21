<?php
	require ('../../db_login.php');
	$id = $_GET['nomorid'];
	$query = "DELETE FROM luar_kimia WHERE id_user = '".$id."' ";
	// Execute the query
	$result = $db->query( $query );
	if (!$result)
	{
		 die ("Could not query the database: <br />". $db->error);
	}
	else
	{
		echo '<script language="javascript">alert("Akun User berhasil dihapus"); document.location="daftar_mhs_nonkim.php";</script>';
		$db->close();
		exit;
	}
?>
