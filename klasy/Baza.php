<?php
class Baza {
    private $mysqli; 

    public function __construct($serwer, $user, $pass, $baza) {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);

        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n",
            $mysqli->connect_error);
            exit();
        }

        if ($this->mysqli->set_charset("utf8")) {
        }
    }
    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $pola) {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) {
            $ilepol = count($pola); 
            $ile = $result->num_rows; 
            $tresc.="<table><tbody>";
            while ($row = $result->fetch_object()) {
                $tresc.="<tr>";
                for ($i = 0; $i < $ilepol; $i++) {
                    $p = $pola[$i];
                    $tresc.="<td>" . $row->$p . "</td>";
                }
                $tresc.="</tr>";
            }
            $tresc.="</tbody></table>";
            $result->close(); 
        }
        return $tresc;
    }

    public function insert($sql) {
        return $this->mysqli->query($sql) === TRUE;
    }

    public function delete($sql) {
        return $this->mysqli->query($sql) === TRUE;
    }

    public function getMysqli() {
        return $this->mysqli;
    }
	
	

	public function selectUser($login, $passwd, $tabela) {
	 //parametry $login, $passwd , $tabela – nazwa tabeli z użytkownikami
	 //wynik – id użytkownika lub -1 jeśli dane logowania nie są poprawne
	 $id = -1;
	 $sql = "SELECT * FROM $tabela WHERE userName='$login'";
	 if ($result = $this->mysqli->query($sql)) {
	 $ile = $result->num_rows;
	 if ($ile == 1) {
	 $row = $result->fetch_object(); //pobierz rekord z użytkownikiem
		$hash = $row->passwd; //pobierz zahaszowane hasło użytkownika
		//sprawdź czy pobrane hasło pasuje do tego z tabeli bazy danych:
		if (password_verify($passwd, $hash))
			$id = $row->id; //jeśli hasła się zgadzają - pobierz id użytkownika
	 }
	 }
	 return $id; //id zalogowanego użytkownika(>0) lub -1
	}
	
	
	
	public function selectRows($userid) {
	 //parametry $login, $passwd , $tabela – nazwa tabeli z użytkownikami
	 //wynik – id użytkownika lub -1 jeśli dane logowania nie są poprawne
	 $id = -1;
	 $sql = "select selected from  userscollections where userID='$userid'";
	 $result = $this->mysqli->query($sql);

	return $result;
	}
	
	
	
	    public static function zmienEmail($db) {
        		
				$email = $_POST["email"];

				$userid = $_SESSION["sessionOK"];
		
				$sql= "UPDATE users SET email = '$email' where  id='$userid'";
				$res = $db->getMysqli()->query($sql);
				
				header("location:center.php");	
		
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
	
	
	

	

} 
?>