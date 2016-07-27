<?php
error_reporting(1);
$url_param = $_REQUEST['code'];

if($url_param == "selection")
 {
      $host="localhost";
      $uname="root";
      $upwd="";
      $link=mysqli_connect($host, $uname, $upwd,"deliccio"); 

      $qry="SELECT * from tb_item";
	  $res=mysqli_query( $link, $qry );
	  while ( $r=mysqli_fetch_row($res) )
	  {
		  $id = $r[0];
		  if ( $r[2]=='Available' )
		  {
			  $response['name'.$id] = $r[1];
			  $response['cost'.$id] = $r[3];
		//	  echo $response['name'.$id]." " .$response['cost'.$id];
		  }
	  }
	 // echo $response;
      echo json_encode($response);
	  exit; 
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