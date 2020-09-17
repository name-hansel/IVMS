<?php
    class Database{
        private $host= 'localhost';
        private $db_name= 'IVMS';
        private $username=  'postgres';
        private $password= 'savpostgresql';
        private $conn;

        public function connect(){
            $this->conn =null;
            try{
                $this->conn = new PDO("pgsql:host=" .$this->host . 'dbname=' . $this->db_name,
                    $this->user_name, $thi->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch(PDOException $e){
                echo 'connection error:' . $e->getMessage();
            }
        }
    }
?>