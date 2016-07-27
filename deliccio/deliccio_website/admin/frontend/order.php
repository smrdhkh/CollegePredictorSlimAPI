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
		<title>Order</title>
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
							<h1>Order</h1>
							<?php 
							echo '
							<table border="3">
<tr>

<th>CLIENT</th>
<th>EMAIL</th>
<th>STATUS</th>
<th>COST</th>
<th>DATE</th>
<th>ADDRESS</th>
<th>ACTION</th>
</tr>';
    $obj=new clscon();
    $link=$obj->db_connect();
    $qry="select * from tb_client inner join tb_order on tb_client.id=tb_order.client_id order by ordertime desc";
    $res=mysqli_query($link,$qry);
    while($r=mysqli_fetch_row($res))
    {
        echo'<tr>';
        echo"<td>"; echo $r[1]; echo"</td>";
        echo"<td>"; echo $r[3]; echo"</td>";
        echo"<td>"; echo '<a href=updateOrder.php?id='.$r[6].'>'.$r[8].'</a>'; echo"</td>";
        echo"<td>"; echo $r[9]; echo"</td>";
        echo"<td>"; echo $r[12]; echo"</td>";
        echo"<td>"; echo $r[11]; echo"</td>";
        echo'<td><a href=delorder.php?oid='.$r[5].'>DELETE</a></td>';
        echo'</tr>';
    }
    $obj->db_close();
    
echo'
</table> ';
?>
						</div>
					</section>

				<!-- One -->
		
	</body>
</html>