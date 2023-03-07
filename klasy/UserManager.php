	
	
	<?php
	
	
	class UserManager {
		 function loginForm() {
		 ?>
		 
		 
		 
		 <form method="post" action="login.php" >
		<h1>Zaloguj się</h1>
		<table>
			<tr> 
				<td><b>Nazwa </b> </td>
				<td><input name="login" size="15" id="nazw"/> </td>
				<td id="nazw_error" class="czerwone">Podaj poprawną nazwę</td>
			</tr>
			<tr> 
				<td><b>Hasło </b></td>
				<td><input name="passwd" size="15" type="password" id="passwd"/> </td>
				<td id="haslo_error" class="czerwone">Podaj poprawne hasło</td>
			</tr>



		</table>


				<input type="button" style="color: white;" class="button" value="Zarejestruj się" onclick="window.location.href='rejestracja.php'" />
				<input type="submit" style="color: white;" class="button" value="Zaloguj" name="zaloguj" />


		</form>
		 

		 
		 
		 
		 
		 
		 
		 
		 <?php
		 }
		 
		 function log($db){
			 $dane = filter_input_array(INPUT_POST, $args);
			 return $dane["login"];
		 }
		 
		 
		 
		 
		 function login($db) {

		 $args = [
		 'login' => FILTER_SANITIZE_ADD_SLASHES ,
		 'passwd' => FILTER_SANITIZE_ADD_SLASHES 
		 ];

		 $dane = filter_input_array(INPUT_POST, $args);

		 $login = $dane["login"];
		 $passwd = $dane["passwd"];
		 $userId = $db->selectUser($login, $passwd, "users");

		 if ($userId > 0) { //Poprawne dane
					
				
				 session_start();
				 $zm = UserManager::getLoggedInUser($db,$userId);
				 //echo $zm;
				 if($zm == -1){
					 $sql = "DELETE FROM logged_in_users WHERE userid='$userId'";
					 $db->getMysqli()->query($sql);
				 }
				 
				
				$_SESSION["sessionOK"] = $userId;

				$date = new DateTime();
				$date = $date->format('Y-m-d H:i:s');
				$ses = session_id();
				$sql = "INSERT INTO logged_in_users VALUES ('$ses', '$userId', '$date')";
				$db->getMysqli()->query($sql);
				 
		 
		 
		}else {
			
			echo '<script>alert("Błędne login lub hasło")</script>';
			$userId = -1;
		}
		 
		 
		 return $userId;
		 }
		 
		 
		 
		 function logout($db) {


			
			session_start();
			$ses = session_id();
			if (filter_input( INPUT_COOKIE,session_name() )) {
			setcookie(session_name(), '', time() - 42000, '/'); }
			
			$sql = "DELETE FROM logged_in_users WHERE sessionid = '$ses'";
			$db->getMysqli()->query($sql);


	 
		 }
		function getLoggedInUser($db, $sessionId) {

		$sql = "SELECT * FROM  logged_in_users WHERE sessionId='$sessionId'";
		if ($result = $db->getMysqli()->query($sql)) {
			$ile = $result->num_rows;
			if ($ile > 0) {
				$finfo = mysqli_fetch_assoc($result);
				return $finfo['userId'];
			}else {
				
				return -1;
			}
		 
		}
		 return -1;
		}
}





?>