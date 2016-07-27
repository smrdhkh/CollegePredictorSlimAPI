<?php 
session_start();
if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: ../login_page.php');
}	
unset( $_SESSION['adminId'] );
header('Location: ../login.php');
?>