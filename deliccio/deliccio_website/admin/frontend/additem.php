<?php 
include_once 'config.php';
$_SESSION['adminId'] = 1;
if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: index.php');
}	
if(isset($_POST["btnadd"]))
{
    $obj = new clsitem();
    $obj->name=$_POST["name"];
    $obj->avail=$_POST["r1"];
    $obj->cost=$_POST["cost"];
    $obj->category=$_POST["r2"];
    $ar=$obj->Save_Item();
    header('Location:menu.php');
}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Update Menu</title>
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
						</br></br>
<form  method="post" class=\"\" action="additem.php">

    <h1>Enter Item Details</h1>
    <label for="name">NAME:</label>
    <input type="text" name="name" /></input></br>
    <label for="name">Availability: </label>
	<input list="type" type="text" name="r1"  >
            <datalist id="type">
            <option value="available">
            <option value="not_available">
            </datalist> </br>
    <label for="name">COST:</label>
    <input type="text" name="cost" /></input></br>
    <label for="name">CATEGORY:</label>
	<input list="type1" type="text" name="r2"  >
            <datalist id="type1">
            <option value="Dessert">
            <option value="Beverage">
			<option value="South_Indian">
			<option value="Punjabi">
			<option value="Italian">
			<option value="Gujrati">
			<option value="Chinese">
            </datalist> 
	</br>
	</br>
	
    <td colspan="2">
    <input type="submit" value="ADD" name="btnadd" />
    </td>
</form>
</body>
</html>