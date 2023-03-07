<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8" />
<title>PokeDex</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script  src="walidacjaLogin.js"></script>
<link rel="stylesheet" href="style.css" />

<style>.czerwone {color: #ffada7; visibility: hidden;}
		#panelReg {height: 300px;}
</style>

</head>
<body>
<div id="panelReg" >


  			<?php
			
			
			include_once 'klasy/Baza.php';
			include_once 'klasy/User.php';
			include_once 'klasy/UserManager.php';
			include_once 'klasy/EmailForm.php';
		
					session_start();

	
			//sprawdzenie zmiennej sesji
			
			
			
			if (isset($_SESSION["sessionOK"])) {

			
				$db = new Baza("localhost", "root", "", "usersnowabaza");
				$em = new EmailForm();


					if (filter_input(INPUT_POST, 'Zmien', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) 
				 {
				 Baza::zmienEmail($db);
				 }
				

				
				
			
			


			
			
			} 

  
  

  
	
		?>



</div>
</body>
</html>
