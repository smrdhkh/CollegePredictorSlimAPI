<?php

//making connection with the database

class clscon
{
    private $link;
    
    public function db_connect()
    {
        $host="localhost";
        $uname="root";
        $upwd="";
        $this->link=  mysqli_connect($host, $uname, $upwd,"deliccio");
        
        return $this->link;
    }
    
    public function db_close()
    {
        mysqli_close($this->link);
    }
    
}

session_start();                //starting the session
include_once 'business_logic.php';
?>