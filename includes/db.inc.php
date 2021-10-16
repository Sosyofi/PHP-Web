<?php
require_once 'config.php';
class DBController
{
    private $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect(Config::$serverName, Config::$dbUserName, Config::$dbPassword, Config::$dbName);
        if ($this->conn->connect_error) {
            echo "Fail" . $this->conn->connect_error;
        }
    }
    public function get_conn()
    {
        return $this->conn;
    }
    public function __destruct()
    {
        $this->closeConnection();
    }
    protected function closeConnection()
    {
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }
}
