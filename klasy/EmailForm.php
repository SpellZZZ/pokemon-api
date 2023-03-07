<?php
class EmailForm {


    function __construct() { ?>
	
	
	<h1>Zmiana email</h1>
<form method="post" action="zmien.php" >
<table>


	<tr> 
		<td><b>Adres e-mail </b> </td>
		<td><input name="email" size ="20" id="email"/></td>
		<td id="email_error" class="czerwone">Podaj poprawny email</td>
		
	</tr>
	
	
</table>

</br>
</br>
</br>

<p>		
		<input type="button"  style="color: white;" class="button"  value="Powrót" onclick="window.location.href='konto.php'" />
		<input type="submit"  style="color: white;" class="button"  value="Zmien" name="Zmien" />
		


</p>
</form>
		

        <?php
		
    }




}
?>