<?php
error_reporting(1);
$username     = $_REQUEST['name'];
$address      = $_REQUEST['address'];
$email        = $_REQUEST['email'];
$phone_no     = $_REQUEST['phone_no'];
$orderlist    = $_REQUEST['orderlist'];
$cost         = $_REQUEST['cost'];
$url_param    = $_REQUEST['code']; 
echo $username." ".$address ;
if($url_param == "insertion")
 {
   $host="localhost";
      $uname="root";
      $upwd="";
      $link=mysqli_connect($host, $uname, $upwd,"deliccio"); 

   $qry="Insert tb_guest values( NULL,'$username', '$address', '$email', '$phone_no' )";
   $res1=mysqli_query( $link, $qry );
   if ( mysqli_affected_rows($link) )
   {
   
      $selectGuestId = "Select * from tb_guest where name='$username', address='$address', email='$email', phone_no='$phone_no'";
      $res2=mysqli_query( $link, $selectGuestId );
      $row=mysqli_fetch_row($res2);
	  $insertid=mysqli_insert_id($link);
   $gid = $row[0];

   $t=date("YY:MM:DD h:i:s");
   $sts = 'Pending';
         $orderQry = "Insert tb_order values( NULL, NULL, '$sts',$cost,'$orderlist','$address', '$t',$insertid)";
         $res3 = mysqli_query( $link, $orderQry );
         if ( mysqli_affected_rows( $link ) )
         {
    echo "inserted";
       $response['msg'] = 'Success';
   }    
   else
   {
    echo "not inserted";
    $response['msg'] = 'Not succesfull';
   }  
   }
  // echo json_encode($response);
   
  /*
  $result = getUserDetailsForApp($username,$password);
  $rowcount = $result->num_rows();
  if($rowcount>0)
  {
   $resp = $result->mysqli_fetch_assoc();
    $response['data']['user'] = $resp;
   $response['CODE'] = 0;
   $response['MSG'] = 'Success';
  }
  else
  {
   $response['CODE'] = 1;
   $response['MSG'] = 'Invalid Username Or Password';
  }
 }
 echo json_encode($response);
exit(0);
*/
}
?>