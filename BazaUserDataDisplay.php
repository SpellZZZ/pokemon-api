<?php



include_once 'klasy/Baza.php';
	 
$db = new Baza("localhost", "root", "", "usersnowabaza");

	
session_start();


if (isset($_SESSION["sessionOK"])) {
	
$userid = $_SESSION["sessionOK"];


$result = $db->selectRows($userid);


while($row = mysqli_fetch_assoc($result)){
   $json[] = $row;
}
echo json_encode($json);


} 







?>