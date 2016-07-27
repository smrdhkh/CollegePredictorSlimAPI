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
		<title>Update Menu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
							<?php

$obj = new clsitem();
$obj->id = $_GET['id'];
$obj->Find_Item();

echo '<html>
<head>
<title>
Item Details
</title>

</head>
<body>

</br></br>
<form  method="post" class=\"\" action="updateMenuProcess.php?id='.$obj->id.'">
    <h1>Item Details</h1>
    
    <label for="name">NAME: </label>
	<input type="text" minlength="1" id="name" name="name" value='."$obj->name";
	echo '></input></br>';
	echo'<label for="name">Status: </label>
             <select name="Availability">
            <option value="Available">Available</option>
            <option value="Not_available">Not Available</option>
            </select> 
	
			</br>
	
	<label for="emailId">Cost: </label>
	<input type="text" minlength="1" id="emailId" name="emailId" value='."$obj->cost";
	echo '>
	</input></br>
	<label for="name">Category: </label>
         <select name="Cat">
  <option value="Dessert">Dessert</option>
  <option value="Beverage">Beverage</option>
  <option value="South_Indian">South Indian</option>
  <option value="Punjabi">Punjabi</option>
  <option value="Italian">Italian</option>
 <option value="Gujarati">Gujarati</option>
 <option value="Chinese">Chinese</option>
 </select> 
    
	</br>
	</br>
	<button id="submit">Submit</button>
</form>
<script>
$("#commentForm").validate();
</script>
</body>
</html>';
?>
					
					