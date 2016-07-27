<?php 
session_start();
if (!isSet( $_SESSION['clientId']) )
{
	header('Location: beverages.php');
}
$id=$_GET['id'];
if ( isSet( $_SESSION['cart'.$id] ) )
{
	$_SESSION['cart'.$id] = (($_SESSION['cart'.$id]-1)>0)  ?  $_SESSION['cart'.$id]-1:0 ;
}
echo "del";
//exit();
header('Location: cart.php');
?>