<?php 
include_once "include/config.php";
$obj=new clscon();
$link=$obj->db_connect();

//$_SESSION['orderId'] = 2;
$oid = $_SESSION['orderId'];

$qry="SELECT * from tb_order where id=".$oid;
$res=mysqli_query($link,$qry);
$r=mysqli_fetch_row($res);

// client name in $_SESSION['clientName']
$qry2="SELECT * from tb_client where id=".$r[1];
$res2=mysqli_query($link,$qry2);
$r2=mysqli_fetch_row($res2);
$_SESSION['clientName'] = $r2[1];

$items=explode(",",$r[4]);
$p=0;
$amt;
$msg='name='.$_SESSION['clientName'].'&bill=';
for($i=0;$i<count($items); )
{
	$j = $i+1;
	$qry1="SELECT * from tb_item where id=".$items[$i];
    $res1=mysqli_query( $link,$qry1 );
	$r1=mysqli_fetch_row($res1);
	
	$_SESSION['arr'.$p]=$r1[1];
	while ($j<count($items) && $items[$i] == $items[$j] )
    {
		$j++;
	}
	$_SESSION['cnt'.($p)]=($j-$i);
	$i = $j;
	$msg = $msg.$_SESSION['arr'.($p)].','.$_SESSION['cnt'.($p)].','.($r1[3]*$_SESSION['cnt'.($p)]).';';
	$amt+=($r1[3]*$_SESSION['cnt'.($p)]);
//	echo $_SESSION['arr'.($p)]." ".$_SESSION['cnt'.($p)]. "; ".  $_SESSION['clientName'];
	$p++;
}
$msg=$msg.'&amt='.$amt;
$_SESSION['count']=$p;
header('Location: idk/billToPdf.php?'.$msg);
?>
