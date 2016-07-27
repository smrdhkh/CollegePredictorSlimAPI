<?php 
include_once 'config.php';
//$_SESSION['adminId'] = 1;
if ( !isSet( $_SESSION['adminId'] ) )
{
	header('Location: ../login.php');
}	

$obj = new clsorder();
$obj->id = $_GET['id'];
$ar=$obj->Find_Order();
//print_r($ar);

if(isset($_POST["btnupd"]))
{
    $obj1 = new clscon();
    $link=$obj1->db_connect();
    $id = $obj->id;
    $status=$_POST["Delivery"];
    $qry="update tb_order set sts='$status' where id=$id";
    $res=mysqli_query($link,$qry);
    if(mysqli_affected_rows($link))
    {
        $obj1->db_close();
        header('Location:order.php');
    }
    else 
    {
        echo "Not updated";
    }
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Update Order</title>
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
							</br></br>
							<?php
	echo '<h1>Update Order</h1>
	<form  method="post" class="" action="updateOrder.php?id='.$obj->id.'">
    <label for="name">Status: </label></br>';
	 
	
        
            echo '<select name="Delivery" minlength="1">
            <option value="Delivered">Delivered</option>
            <option value="Not_Delivered">Not Delivered</option>
            <option value="Pending">Pending</option>
            </select> 
            </br>
	';
	



    echo'
	</br>
	</br>
	<tr>
        <td colspan="2">
        <input type="submit" minlength="1" value="UPDATE" name="btnupd" />
        </td>
        </tr>
    </form>
	<script>
$("#commentForm").validate();
</script>
						</div>
					</section>

				<!-- One -->
		
	</body>
</html>';