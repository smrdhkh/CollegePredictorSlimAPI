<?php
include_once 'config.php';
if(isset($_REQUEST["oid"]))
    {
        $obj=new clsorder();
        $obj->id=$_REQUEST["oid"];
        $obj->Delete_Order();
        header('Location:order.php');
    }
?>