<?php

//create array of database
//$conn = mysqli_connect("localhost", "root", "root", "myprogram")or die(mysqli_error());
$conn = mysqli_connect("localhost", "root", "ocelisa$$", "myprogram")or die(mysqli_error());

mysqli_select_db($conn, "myprogram")or die(mysqli_error());

if(isset($_GET['id'])){
	$id = ($_GET['id']);

	$query = mysqli_query($conn,"SELECT UPC FROM csvtable WHERE id = '$id'")or die(mysqli_error());

	$array = Array();
}
	while($result = $query->fetch_assoc())
	{
		$array[] = $result['UPC'];
	}

	$redirect = "scan.php?".http_build_query($array);
    header( "Location: $redirect" );
