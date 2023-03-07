<?php
    class User {
        const STATUS_USER = 1;
        const STATUS_ADMIN = 2;
        protected $userName;
        protected $passwd;
        protected $wiek;
        protected $email;
        protected $date;
        protected $status;

        function __construct($userName, $wiek, $email, $passwd) {
            $this->userName = $userName;
            $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
            $this->wiek = $wiek;
            $this->email = $email;
            $this->date = new DateTime();
            $this->date = $this->date->format('Y-m-d');
            $this->status = User::STATUS_USER;
        }

        function saveDB($bd) {
            $stmt = $bd->getMysqli()->prepare(
                "INSERT INTO users 
                (`userName`, `wiek`, `email`, `passwd`, `status`, `date`)
                VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                'ssssis',
                $this->userName,
                $this->wiek,
                $this->email,
                $this->passwd,
                $this->status,
                $this->date);

            
            $stmt->execute();
            $errno = $stmt->errno;

            if ($errno !== 0) {
                echo "<p>Problem z zpaisem użytkownika, kod błędu: $errno</p>";
            }
        }

        static function getAllUsersFromDB($bd) {
            $query = "SELECT userName, wiek, email, passwd, `date`, `status`
                FROM users";
            $cols = ['userName', 'wiek', 'email', 'passwd', 'date', 'status'];
            $result = $bd->select($query, $cols);
            echo $result;
        }


		
		
		

		
		
		
		
		
		
        function toArray(){
            $arr=[
                "userName" => $this->userName,
                "wiek" => $this->wiek,
                "email" => $this->email,
                "passwd" => $this->passwd,
                "date" => $this->date,
                "status" => $this->status,
            ];
            return $arr;
        }





        public function show() {
            echo $this->userName.' '.$this->wiek.
                ' '.$this->email.' status:'.$this->status.
                ' '.$this->date;
        }

        public function getUserName() {
                return $this->userName;
        }

        public function setUserName($userName) {
            $this->userName = $userName;
            return $this;
        }
        
        public function getPasswd() {
                return $this->passwd;
        }
        
        public function setPasswd($passwd) {
            $this->passwd = $passwd;
            return $this;
        }
        
        public function getWiek() {
            return $this->wiek;
        }
        
        public function setWiek($wiek) {
            $this->wiek = $wiek;
            return $this;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email) {
            $this->email = $email;
            return $this;
        }

        public function getDate() {
            return $this->date;
        }
        
        public function setDate($date) {
            $this->date = $date;
            return $this;
        }
        
        public function getStatus(){
            return $this->status;
        }
        
        public function setStatus($status) {
            $this->status = $status;
            return $this;
        }
    }
	
	
	
	


	
	
?>
