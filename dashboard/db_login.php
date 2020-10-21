<?php
	//File 	: db_login.php
	//Deskripsi	: file ini dipergunakan untuk menyambungkan(mengkoneksikan) database ke project web

	$db_host='localhost';
	$db_database='siladek';
	$db_username='root';
	$db_password='';
	
	$db = mysqli_connect($db_host, $db_username, $db_password,$db_database);
	if (mysqli_connect_errno())
	{
		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>