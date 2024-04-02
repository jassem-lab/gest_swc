<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swc";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}

	
	$id = $_GET['ID'];
	$sql = "select * from swc_profs where id=".$id ; 
	$req = mysqli_query($conn , $sql);
	while ($enreg = mysqli_fetch_array($req)) {
		$email = $enreg["email"] ; 
	}
	$sql2 = "DELETE FROM `swc_profs` WHERE `email` = '".$email."' ORDER BY `id` DESC";
	$requete2 = mysqli_query($conn,$sql2); 

	
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gestprof.php"</SCRIPT>';

?>