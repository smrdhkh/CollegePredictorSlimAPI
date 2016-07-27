<?php 
include_once 'config.php';
//$_SESSION['adminId'] = 1;
if ( !isSet( $_SESSION['adminId'] ) ) {
	header('Location: ../login_page.php');
}	
if ( !isSet($_POST['name']) )
{
	header('Location: update.php');
}
if ( !isSet($_POST['Availability']) )
{
	header('Location: update.php');
}
if ( !isSet($_POST['emailId']) )
{
	header('Location: update.php');
}
if ( !isSet($_POST['Cat']) )
{
	header('Location: update.php');
}
//echo $_POST['name']. $_POST['Availability'] . $_POST['emailId'] . $_POST['Cat'];
$obj = new clsitem();
$obj->id = $_GET['id'];
$obj->name=$_POST['name'];
$obj->avail=$_POST['Availability'];
$obj->cost=$_POST['emailId'];
$obj->category=$_POST['Cat'];
$obj->Update_Item();

header('Location: menu.php');
?>