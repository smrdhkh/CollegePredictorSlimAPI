<?php 
include_once 'config.php';
if ( !isSet( $_SESSION['adminId'] ) ) {
	header('Location: index.php');
}	
$obj = new clsclient();
$obj->id = $_GET['id'];
$obj->Find_Client();

echo '<html>
<head>
<title>
User Details
</title>

</head>
<body>

</br></br>
<form  method="post" class=\"\" action="updateClientProces.php?id='.$obj->id.'">
    <h1>User Details</h1>
    <h2><span>-></span>Enter Your Details</h2>
    <label for="name">NAME: </label></br>
	<input type="text" id="name" name="name" value="'.$obj->name.'"/>
	</br>
	</br>
	<label for="name">EMAIL: </label></br>
	<input type="text" id="email" name="email" value="'.$obj->email.'"/>
	</br>
	</br>
	<label for="name">Phone Number: </label></br>
	<input type="text" id="phone_no" name="phone_no" value="'.$obj->phone_no.'"/>
	</br>
	</br>
	<label for="name">Password: </label></br>
	<input type="text" id="passwd" name="passwd" value="'.$obj->pwd.'"/>
	</br>
	</br>
	
	<button id="submit">Submit</button>
</form>
</body>
</html>';

?>