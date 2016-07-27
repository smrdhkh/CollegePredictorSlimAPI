<?php
include_once 'config.php';
if(isset($_REQUEST["cid"]))
    {
        $obj=new clsclient();
        $obj->id=$_REQUEST["cid"];
        $obj->Delete_Client();
        header('Location:customer.php');
    }
?>