<?php 
include_once 'config.php';

 //$_SESSION['adminId']=1;
if ( !isSet( $_SESSION['adminId'] ) ) {
	header('Location: ../login_page.php');
}	
if ( !isSet($_POST['name']) )
{
	header("Location: updateCustomer.php?id=$obj->id");
}
if ( !isSet($_POST['email']) )
{
	header("Location: updateCustomer.php?id=$obj->id");
}
if ( !isSet($_POST['phone_no']) )
{
	header("Location: updateCustomer.php?id=$obj->id");
}
//echo $_POST['name'].$_POST['passwd'].$_POST['email'].$_POST['phone_no'];
$obj = new clsclient();
$obj->id = $_GET['id'];
$obj->name=$_POST['name'];
$obj->phone_no=$_POST['phone_no'];
$obj->email=$_POST['email'];
$obj->address=$_POST['address'];
$obj->pwd=md5($_POST['passwd']);
$r=$obj->Update_Client();
header( 'Location: customer.php' );
 $object->db_close();
?>