<?php
class RegistrationForm {
    protected $user;

    function __construct() { ?>
	
	
	
<h1>Zarejestruj się</h1>
<form method="post" action="rejestracja.php"  >
<table>
	<tr> 
		<td><b>Nazwa </b></td>
		<td><input name="userName" size="20" id="nazw"/> </td>
		<td id="nazw_error" class="czerwone">Nazwa błędna lub zajęta</td>
	</tr>
	<tr> 
		<td><b>Wiek </b></td>
		<td><input name="wiek" size ="3" id="wiek"/></td>
		<td id="wiek_error" class="czerwone">Podaj poprawny wiek</td>
	</tr>
	<tr> 
		<td><b>Adres e-mail </b> </td>
		<td><input name="email" size ="20" id="email"/></td>
		<td id="email_error" class="czerwone">Podaj poprawny email</td>
	</tr>
	
	<tr> 
		<td><b>Hasło </b> </td>
		<td><input name="passwd" type=password size ="20" id="passwd"/></td>
		<td id="passwd_error" class="czerwone">Podaj poprawne hasło</td>
	</tr>
	<tr> 
		<td><b>Powtórz Hasło </b> </td>
		<td><input name="passwd2" type=password size ="20" id="passwd2"/></td>
		<td id="passwd_error2" class="czerwone">Hasła się różnią</td>
	</tr>
	
</table>



<p>
		<input type="button"  style="color: white;" class="button"  value="Powrót" onclick="window.location.href='login.php'" />
		<input type="submit"  style="color: white;" class="button"  value="Rejestruj" name="submit"  "/>


</p>
</form>
		
		

        <?php
    }



    function checkUser() { 
        $args = [
        'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
        'wiek' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[1-9][0-9]{1,2}$/']],
        'email' => FILTER_VALIDATE_EMAIL,
        'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_\-,\\/\.,!@#$%^&*()_+=-{}\[\]]{4,25}$/']],
        ];

        $dane = filter_input_array(INPUT_POST, $args);
        $errors = "";

        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }

        if ($errors === "") {
            $this->user = new User($dane['userName'], $dane['wiek'],
                $dane['email'],$dane['passwd']);
        } else {
            echo "<p>Błędne dane:$errors</p>";
            $this->user = NULL;
        }

        return $this->user;
    }
}
?>