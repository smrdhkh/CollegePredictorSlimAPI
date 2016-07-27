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
		<title>Update Customer</title>
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
$obj = new clsclient();
$obj->id = $_GET['id'];
$obj->Find_Client();
echo'


</br></br>
<form  method="post" id="commentForm" class="" action="updateCustomerProcess.php?id='.$obj->id.'">
    <h1>Customer Details</h1>

    <label for="name">NAME: </label></br>
	<input type="text" id="name" name="name" value="'.$obj->name.'" minlength="1" required/>
	</br>
	</br>
	
	<label for="name">EMAIL: </label></br>
	<input type="email" id="email" name="email" value="'.$obj->email.'" minlength="1"/>
	</br>
	</br>
	<label for="name">Phone Number: </label></br>
	<input type="text" id="phone_no" name="phone_no" value="'.$obj->phone_no.'" minlength="1"/>
	</br>
	</br>
	<label for="name">Password: </label></br>
	<input type="text" id="passwd" name="passwd" value="'.$obj->pwd.'" minlength="1"/>
	</br>
	</br>
        <label for="name">Address: </label></br>
	<input type="text" id="address" name="address" value="'.$obj->address.'" minlength="1"/>
	</br>
	</br>
	<button id="submit">Submit</button>
</form>
<script>
$("#commentForm").validate();
</script>
<script>
$(document).ready(function(e) {
var sEmail = $(\'#txtEmail\').val();
// Checking Empty Fields
if ($.trim(sEmail).length == 0 || $("#fname").val()=="" || $("#lname").val()=="") {
alert(\'All fields are mandatory\');
e.preventDefault();
}
if (validateEmail(sEmail)) {
alert(\'Nice!! your Email is valid, now you can continue..\');
}
else {
alert(\'Invalid Email Address\');
e.preventDefault();
}
});
});
// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}
</script>
';
							?>
						</div>
					</section>

				<!-- One -->
		
	</body>
</html>