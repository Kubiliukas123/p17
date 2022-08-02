<?php
class DB{
    public $conn;

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "vcs_p15";
        $this->conn = new mysqli($host, $username, $password, $db);
    }
}
?>