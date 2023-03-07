<?php

$q = $_GET["id"];




include_once 'klasy/Baza.php';
	 
$db = new Baza("localhost", "root", "", "usersnowabaza");



	
session_start();


if (isset($_SESSION["sessionOK"])) {
	
$userid = $_SESSION["sessionOK"];
			
		

	$sql = "DELETE FROM userscollections WHERE (userID='$userid' and selected='$q')";
	


$db->getMysqli()->query($sql);
} 



?>