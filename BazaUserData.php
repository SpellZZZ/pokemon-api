<?php

$q = $_GET["id"];
$o = $_GET["op"];



include_once 'klasy/Baza.php';
	 
$db = new Baza("localhost", "root", "", "usersnowabaza");



	
session_start();


if (isset($_SESSION["sessionOK"])) {
	
$userid = $_SESSION["sessionOK"];
			
		
if($o == '1'){
	$sql = "INSERT INTO userscollections VALUES ('$1', '$userid', '$q')";
}
else {
	$sql = "DELETE FROM userscollections WHERE (userID='$userid' and selected='$q')";
	
}

$db->getMysqli()->query($sql);
} 



?>