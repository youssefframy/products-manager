<?php
    
    class DBController {
        public $dbHost = "localhost";
        public $dbUser = "root";
        public $dbPassword = "";
        public $dbName = "products_manager";
        public $connection;

        public function openConnection() {
            $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
            if($this->connection->connect_error){
                echo "Error: " . $this->connection->connect_error . "\n";
                return false;
            } else {
                return true;
            }
        }

        public function closeConnection() {
            if($this->connection){
                $this->connection->close();
            }else {
                echo "Connection is already closed";
            }
        }

        public function select($query){
            $result = $this->connection->query($query);
            if(!$result){
                echo "Error : ".mysqli_error($this->connection);
                return false;
            } else {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }

        public function insert($query){
            $result = $this->connection->query($query);
            if(!$result){
                echo "Error: ". mysqli_error($this->connection);
                return false;
            }else{
                return true;
            }
        }

        public function delete($query){
            $result = $this->connection->query($query);
            if(!$result){
                echo "Error: ". mysqli_error($this->connection);
                return false;
            }else{
                return true;
            }
        }

    }
?>