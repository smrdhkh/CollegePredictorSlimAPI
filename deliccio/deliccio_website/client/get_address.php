<?php
include_once "include/config.php";

include_once "include/cart_front.php";

//echo $_GET["list"];
if(isset($_POST["btn_address"]))
{
    $obj=new clsorder();
    $obj->client_id=$_SESSION["clientId"];
    $obj->sts="Pending";
    $obj->cost=$_GET["bill"];
    $obj->list=$_GET["list"];
    $obj->address=$_POST["address"];
   // echo $obj->address;
    $obj->receive_time= date("yy-mm-dd h:i:s");

    //echo date("yy-mm-dd h:i:s");
    //echo $obj->receive_time;
    $obj->Save_Order();
	$conn=new clscon();
	$link=$conn->db_connect();
	$qry="select * from tb_order where orderlist='$obj->list' and address='$obj->address' and client_id=$obj->client_id";
	$res=mysqli_query($link,$qry);
	$r=mysqli_fetch_row($res);
	
	$_SESSION["orderId"]=$r[0];
	echo $_SESSION["orderId"];
	
//	exit();

	header('Location:billDb.php');
	
}
?>

<html>
    <head>
        <title>Dellicio |Address </title>
    </head>    
    <body>
        <form name="frm_ad" id="frm_ad" method="POST" action="">
                    <label>Delivery Address</label>
                    <?php
                    
                        $conn=new clscon();
                        $link=$conn->db_connect();
                    
                        $cid=$_SESSION["clientId"];
                        
                        $qry="select * from tb_client where id=$cid";
                       // echo $qry;
                        $res=mysqli_query($link,$qry);
                     //   echo $res;
                        $r=mysqli_fetch_row($res);
                        $a=$r[4];
                       // echo $a;
                        $conn->db_close();
                     ?>
                    <input type="text" name="address" placeholder="Address" value="<?php echo $a;?>"><br>
                    
                    <input type="submit" name="btn_address" value="Get Bill">
                    
        </form>
    </body>
</html>