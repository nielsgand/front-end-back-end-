<?php 

    class Database {
        private $host = "localhost";
        private $db = "hostit";
        private $username = "root";
        private $password = "";
        public $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db, $this->username, $this->password);
                // echo "Conection Success";
            } catch(PDOException $exception) {
                echo "Connection Error: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }

?>