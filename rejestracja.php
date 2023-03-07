<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8" />
<title>PokeDex</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script  src="walidacjaLogin.js"></script>
<link rel="stylesheet" href="style.css" />

<style>.czerwone {color: #ffada7; visibility: hidden;}</style>

</head>
<body>
<div id="panelReg">


    <?php
        include_once 'klasy/User.php';
        include_once 'klasy/RegistrationForm.php';
        include_once 'klasy/Baza.php';

        $db = new Baza("localhost", "root", "", "usersnowabaza");

        $rf = new RegistrationForm();
        if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
            $user = $rf->checkUser();       
            if ($user === NULL) {
            } else {

				header("location:login.php");	
                $user->saveDB($db);
            }
        }

    ?>




</div>
</body>
</html>
