<?php
include_once 'config.php';
if ( !isSet( $_SESSION['adminId'] ) ) {
	header('Location: index.php');
}	

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
<form  method="post" class=\"\" action="updateProcess.php?id='.$obj->id.'">
    <h1>User Details</h1>
    <h2><span>-></span>Enter Your Details</h2>
    <label for="name">NAME: </label></br>
	<input type="text" id="name" name="name" value='."$obj->name";
	echo '></input></br>';
	$avail = 'available';
	$n_avail = 'not_available';
	if ( $obj->avail == $avail ) {
		echo '
	  <input type="radio" name="Availability" value="avail" checked> Available<br>
      <input type="radio" name="Availability" value="not_avail"> Not Available<br>
	';
	}
	else
	{
		echo '
	  <input type="radio" name="Availability" value="available" > Available<br>
  <input type="radio" name="Availability" value="not_available" checked> Not Available<br>
	';
	}
	echo '
	
	<label for="emailId">Cost: </label></br>
	<input type="text" id="emailId" name="emailId" value='."$obj->cost";
//	'Dessert','Beverage','South_Indian','Punjabi','Italian','Gujarati','Chinese'
    $des = 'Dessert';
	$bev = 'Beverage';
	$south='South_Indian';
	$pbi = 'Punjabi';
	$ital='Italian';
	$guj='Gujarati';
	$ch='Chinese';
	echo'></input></br>';
	if ( $obj->category==$des )
	{
		echo '
	    <input type="radio" name="Cat" value="Dessert" checked> Dessert<br>
        <input type="radio" name="Cat" value="Beverages" > Beverages<br>
		<input type="radio" name="Cat" value="South_Indian" > South Indian<br>
		<input type="radio" name="Cat" value="Punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="Italian" > Italian<br>
		<input type="radio" name="Cat" value="Gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$bev )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" checked> Beverages<br>
		<input type="radio" name="Cat" value="south" > South Indian<br>
		<input type="radio" name="Cat" value="punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="italian" > Italian<br>
		<input type="radio" name="Cat" value="gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$south )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" > Beverages<br>
		<input type="radio" name="Cat" value="south" checked> South Indian<br>
		<input type="radio" name="Cat" value="punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="italian" > Italian<br>
		<input type="radio" name="Cat" value="gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$pbi )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" > Beverages<br>
		<input type="radio" name="Cat" value="south" > South Indian<br>
		<input type="radio" name="Cat" value="punjabi" checked> Punjabi<br>
		<input type="radio" name="Cat" value="italian" > Italian<br>
		<input type="radio" name="Cat" value="gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$ital )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" > Beverages<br>
		<input type="radio" name="Cat" value="south" > South Indian<br>
		<input type="radio" name="Cat" value="punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="italian" checked> Italian<br>
		<input type="radio" name="Cat" value="gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$guj )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" > Beverages<br>
		<input type="radio" name="Cat" value="south" > South Indian<br>
		<input type="radio" name="Cat" value="punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="italian" > Italian<br>
		<input type="radio" name="Cat" value="gujrati" checked> Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" > Chinese<br>
	    ';
	}
	else if ( $obj->category==$ch )
	{
		echo '
	    <input type="radio" name="Cat" value="dessert" > Dessert<br>
        <input type="radio" name="Cat" value="beverages" > Beverages<br>
		<input type="radio" name="Cat" value="south" > South Indian<br>
		<input type="radio" name="Cat" value="punjabi" > Punjabi<br>
		<input type="radio" name="Cat" value="italian" > Italian<br>
		<input type="radio" name="Cat" value="gujrati" > Gujrati<br>
		<input type="radio" name="Cat" value="Chinese" checked> Chinese<br>
	    ';
	}
    echo'
	</br>
	</br>
	<button id="submit">Submit</button>
</form>
</body>
</html>';
?>