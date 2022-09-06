<?php

class Connection
{

    public $db_host;
    public $db_user;
    public $db_password;
    public $db_name;

    public function __construct($db_host, $db_user, $db_password, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }

    public function conectToDB()
    {
        try {
            $conn = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
