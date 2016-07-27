<!DOCTYPE HTML>
<?php 
include_once 'config.php';
//$_SESSION['adminId'] = 1;
if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: ../login_page.php');
}	
?>
<html>
	<head>
		<title>Menu</title>
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
							<h1>Menu</h1>
							<?php
echo'							<table border="3">

<th>NAME</th>
<th>AVAILABLE</th>
<th>COST</th>
<th>CATEGORY</th>
</tr>';
    $obj=new clsitem();
    $ar=$obj->Display_Item();
    for($i=0;$i<count($ar);$i++)
    {
        echo'<tr>';

        echo"<td>"; echo '<a href=updateMenu.php?id='.$ar[$i][0].'>'.$ar[$i][1].'</a>'; echo"</td>";
        echo"<td>"; echo $ar[$i][2]; echo"</td>";
        echo"<td>"; echo $ar[$i][3]; echo"</td>";
        echo"<td>"; echo $ar[$i][4]; echo"</td>";
        echo'</tr>';
    }
echo'</table>
<form  method="post"  action="additem.php">
<button id="submit">ADD ITEM</button>
</form>
<br><br>';

				?>			
						</div>
					</section>

				<!-- One -->
		
	</body>
</html>