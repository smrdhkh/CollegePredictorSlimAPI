<?php 
include_once 'config.php';
if ( !isSet( $_SESSION['adminId'] ) ) {
	header('Location: index.php');
}	
if ( !isSet($_POST['name']) )
{
	header('Location: updateClient.php');
}
if ( !isSet($_POST['email']) )
{
	header('Location: updateClient.php');
}
if ( !isSet($_POST['phone_no']) )
{
	header('Location: updateClient.php');
}
echo $_POST['name'].$_POST['passwd'].$_POST['email'].$_POST['phone_no'];
$obj = new clsclient();
$obj->id = $_GET['id'];
$obj->name=$_POST['name'];
$obj->phone_no=$_POST['phone_no'];
$obj->email=$_POST['email'];
$obj->pwd=$_POST['passwd'];
$r=$obj->Update_Client();
echo $r;
exit();
header( 'Location: login_page.php' );
?>