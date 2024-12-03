<?php
    namespace src\config;   
    use PDO;
    use PDOException;

    class Connection {
        private $host = "localhost";
        private $dbname = "stock_id";
        private $user = "root";
        private $password = "";

        public $conn;

        public function getConnection() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);

                $this->conn->exec("set names utf8");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $this->conn;
        }
    }

?>