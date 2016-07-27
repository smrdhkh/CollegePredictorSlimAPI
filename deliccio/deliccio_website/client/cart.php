<?php
include_once "include/config.php";
include_once "include/cart_front.php";
if (!isSet( $_SESSION['clientId']) )
{
	header('Location:client_login.php');
}

//    echo "hi". $_GET["bid"];
    if(isset($_GET['bid']))
    {
    //    echo $_GET["bid"];
        if ( !isSet( $_SESSION[ 'cart'.$_GET['bid'] ] ) )
		{
			$_SESSION[ 'cart'.$_GET['bid'] ] = 1;
		}			
		else
		{
			$_SESSION[ 'cart'.$_GET['bid'] ]++;
		}
                
        header('Location:beverages.php');
        
 
    }
     if(isset($_REQUEST["cid"]))
    {
		if ( !isSet( $_SESSION[ 'cart'.$_REQUEST["cid"] ] ) )
		{
			$_SESSION[ 'cart'.$_REQUEST["cid"] ] = 1;
		}			
		else
		{
			$_SESSION[ 'cart'.$_REQUEST["cid"] ]++;
		}
        header('Location:cuisine.php');
    }
      if(isset($_REQUEST["did"]))
    {
        if ( !isSet( $_SESSION[ 'cart'.$_REQUEST["did"] ] ) )
		{
			$_SESSION[ 'cart'.$_REQUEST["did"] ] = 1;
		}			
		else
		{
			$_SESSION[ 'cart'.$_REQUEST["did"] ]++;
		}
        header('Location:dessert.php');
    }
        
		echo '<table cellspacing="0", width="35%">
		<tr>
		   <th>NAME</th>
		   <th>Quantity</th>
		   <th>Amount</th>
		   <th>Action </th>
		</tr>
		';
		$bill = 0;
		for ( $i=1;$i<10000;$i++ )
		{
			if ( isSet( $_SESSION['cart'.$i] ) && $_SESSION['cart'.$i] > 0 )
			{
				$obj=new clscon();
				$link=$obj->db_connect();
				$qry="SELECT * from tb_item where id=".$i;
				$res=mysqli_query($link,$qry);
				$r=mysqli_fetch_row($res);
				$cost = $r[3]*$_SESSION['cart'.$i];
				$amt = $_SESSION['cart'.$i];
				$bill = $bill+$cost;
                                
                                if(!isset($list))
                                {
                                    $list=$i;
                                }
                                else
                                {
                                    
                                $list=$list.','.$i;
			    
                                }
                                    echo "<tr>
				   <td>$r[1]</td>
				   <td>$amt</td>
				   <td>$cost</td>
				   <td><a href=\"deleteCart.php?id=$i\" >Remove</td>
				</tr>";   
			}
			
	    }
		echo "<h2>Total Bill = $bill</h2>";
		echo '</table>';
                
if(isset($list))
{
    echo"<a href=get_address.php?list=$list&bill=$bill>Buy All</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    
}
else
{
    
            echo '<script language="javascript">';
            echo 'alert("Cart is empty...Go back")';
            echo '</script>';
            
            
}
?>
</html>
    