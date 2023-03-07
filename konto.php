<!DOCTYPE html>
<html lang="pl">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="js.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="walidacjaLogin.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
	<script src="konto.js"></script>
	
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
    <title>PokeDex</title>

</head>
<body onload="getSelectedPoke2()">

		<header>
		
		
		
		
		
		  			<?php
			include_once 'klasy/Baza.php';
			include_once 'klasy/User.php';
			include_once 'klasy/UserManager.php';

			
			$db = new Baza("localhost", "root", "", "usersnowabaza");
			
			  	session_start();
	
			//sprawdzenie zmiennej sesji
			if (isset($_SESSION["sessionOK"])) {
				
			$userid = $_SESSION["sessionOK"];
			
			$sql= "SELECT * FROM  users WHERE id='$userid'";
			$res = $db->getMysqli()->query($sql);
			$finfo = mysqli_fetch_assoc($res);

			
			
			} 
			else {
					header("location:login.php");		
			}
  
  
			
			
			
			
  
	
			echo " <div id='zalogowanyJako2'> Użytkownik zalogowany jako: <b>" .$finfo['userName']. "</b></div>"; ?>
		
		
		
			<!--<input class="buttonWyl" type="button" value="Wyloguj"  onclick="logOut()" />-->
			<?php echo "<a href='login.php?akcja=wyloguj' ><div class='buttonWyl'>Wyloguj </div></a>"; ?>
		<a class="button" href="zmien.php" />Zmień dane</a>
		<a class="button"  href="center.php">Strona główna</a>
		
		</header>
  
  
    <main>
      <div id="a" class="pokemonBox"></div>
    </main>
		


 <script src="konto.js"></script>

</body>
</html>