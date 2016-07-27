<?php 
include_once 'config.php';
//$_SESSION['adminId'] = 1;
if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: ../login_page.php');
}	
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Customer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
					<form  method="post"  action="logout.php">
<button id="submit">Logout</button>
</form>
						<ul>
							<li><a href="menu.php">View Menu</a></li>
							<li><a href="order.php">View Orders</a></li>
							<li><a href="customer.php">View Customers</a></li>
							
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Customers</h1>
<?php 		
echo '
<table border="3">
<tr>

<th>NAME</th>
<th>PASSWORD</th>
<th>EMAIL</th>
<th>ADDRESS</th>
<th>PHONE NO</th>
<th>ACTION</th>
</tr>';
    $obj=new clsclient();
    $ar=$obj->Display_Client();
    for($i=0;$i<count($ar);$i++)
    {
        echo'<tr>';
       // echo"<td>"; echo $ar[$i][0]; echo"</td>";
	   echo "<td> <a href =\"updateCustomer.php?id=".$ar[$i][0]."\">"; echo $ar[$i][1]; echo"</a></td> ";
      //  echo"<td>"; echo $ar[$i][1]; echo"</td>";
        echo"<td>"; echo $ar[$i][2]; echo"</td>";
        echo"<td>"; echo $ar[$i][3]; echo"</td>";
        echo"<td>"; echo $ar[$i][4]; echo"</td>";
        echo"<td>"; echo $ar[$i][5]; echo"</td>";
        echo'<td><a href=delclient.php?cid='.$ar[$i][0].'>DELETE</a></td>';
        echo'</tr>';
    }
echo'</table>
    <br><br>';
					
?>
						</div>
					</section>

				<!-- One -->
		
	</body>
</html>