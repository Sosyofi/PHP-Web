<!-- Veri tabanı ile bağlantı kodları yazılacak. -->
<?php

class DBController
{
    private $serverName = "";   //Bu alanlar doldurulacak.
    private $dbUserName = "";   //Bu alanlar doldurulacak.
    private $dbPassword = "";   //Bu alanlar doldurulacak.
    private $dbName = "";   //Bu alanlar doldurulacak.

    private $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->serverName, $this->dbUserName, $this->dbPassword, $this->dbName);
        if($this->conn->connect_error){
            echo "Fail" . $this->conn->connect_error;
        }
    }
    public function get_conn(){
        return $this->conn;
    }
    public function __destruct(){
        $this->closeConnection();
    }
   protected function closeConnection(){
       if($this->conn != null){
           $this->conn->close();
           $this->conn = null;
       }
   }
}