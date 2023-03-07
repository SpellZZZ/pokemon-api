<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8" />
<title>PokeDex</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="walidacjaLogin.js"></script>

 <link rel="stylesheet" href="style.css" />
<style>.czerwone {color: #ffada7; visibility: hidden;}</style>

</head>

<body onload="checkLog()">


<div id="panel">



<?php

	 include_once 'klasy/Baza.php';
	 include_once 'klasy/User.php';
	 include_once 'klasy/UserManager.php';
	 $db = new Baza("localhost", "root", "", "usersnowabaza");
	 $um = new UserManager();

	 if (filter_input(INPUT_GET, "akcja")=="wyloguj") {
	 $um->logout($db);
	 }

	 if (filter_input(INPUT_POST, "zaloguj")) {
	 $userId=$um->login($db); 
	 if ($userId >= 0) {

	header("location:center.php");
	 } else {
	 
	 $um->loginForm();
	 }
	 } else {
	 $um->loginForm();
	 }
 ?>






<p id="wynik"></p>
</div>

</body>
</html>