<?php

include_once 'config.php';
$_SESSION['adminId'] = 1;

if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: index.php');
}	

echo ' 
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<link href=\'http://fonts.googleapis.com/css?family=Droid+Sans\' rel=\'stylesheet\' type=\'text/css\'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- -->
<script>var __links = document.querySelectorAll(\'a\');function __linkClick(e) { parent.window.postMessage(this.href, \'*\');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute(\'data-t\') == \'_blank\' ) { __links[i].addEventListener(\'click\', __linkClick, false);}}</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>$(document).ready(function(c) {
	$(\'.alert-close\').on(\'click\', function(c){
		$(\'.message\').fadeOut(\'slow\', function(c){
	  		$(\'.message\').remove();
		});
	});	  
});
</script>
</head>
<body>
<!-- Logout button -->
<form  method="post"  action="logout.php">
<button id="submit">Logout</button>
</form>
<!-- Item Table -->
<h1>ITEM:</h1>
<table cellspacing="0" width="45%">
<tr>
<th>Item Id </th>
<th>Name </th>
<th>Available </th>
<th>Cost </th>
<th>Category </th>
</tr>';
$obj = new clsitem();
$ar=$obj->Display_Item();
for ($i=0;$i<count($ar);$i++)
{
	echo "<tr>";
	echo "<td>"; echo $ar[$i][0]; echo"</td> ";
	echo "<td> <a href =\"update.php?id=".$ar[$i][0]."\">"; echo $ar[$i][1]; echo"</a></td> ";
	
	// anchor tag here on available
	echo "<td>"; echo $ar[$i][2]; echo"</td> ";
	echo "<td>"; echo $ar[$i][3]; echo"</td> ";
	echo "<td>"; echo $ar[$i][4]; echo"</td> ";
	
	echo "</tr>";
}
echo '
</table>	</br></br>
<h1>Order:</h1>
<table cellspacing="0" width="20%">
<tr>
<th>Order Id </th>
<th>Name </th>
<th>Available </th>
</tr>
<tr >
<td>test</td>
<td>test</td>
<td>test</td>
</tr>
<tr >
<td>test</td>
<td>test</td>
<td>test</td>
</tr>
<tr >
<td>test</td>
<td>test</td>
<td>test</td>
</tr>
</table>	
</br></br>
<h1>Customer:</h1>
<table cellspacing="0" width="45%">
<tr>
<th>Id </th>
<th>Name </th>
<th>Email </th>
<th>Phone Number </th>

</tr>';
$obj = new clsclient();
$ar=$obj->Display_Client();
for ($i=0;$i<count($ar);$i++)
{
	echo "<tr>";
	echo "<td>"; echo $ar[$i][0]; echo"</td> ";
	echo "<td> <a href =\"updateClient.php?id=".$ar[$i][0]."\">"; echo $ar[$i][1]; echo"</a></td> ";
	
	// anchor tag here on available
	echo "<td>"; echo $ar[$i][3]; echo"</td> ";
	echo "<td>"; echo $ar[$i][4]; echo"</td> ";
	echo "</tr>";
}
echo '
</table>	</br></br>

</body>
</html>';
?>