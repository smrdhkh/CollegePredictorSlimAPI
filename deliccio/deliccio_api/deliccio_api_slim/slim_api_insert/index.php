<?php 
require 'vendor/autoload.php';

$configure['displayErrorDetails']= true;
$app= new Slim\App(["settings"=>$configure]);

$app->post('/',function($request, $response, $args) {
	$response ->write("Stay Away!!");
	return $response;
});

class MyDb extends SQLite3{
	function __construct(){
		$this->open("deliccio6.db");
	}
	function closeDb()
	{
		$this->close();
	}
};

$db=NULL;

$app->post('/SS1' , function($request , $response, $args){
	$data=$request->getParsedBody();
	$urlparam=filter_var( $data['name'],FILTER_SANITIZE_STRING);
	$gname=filter_var( $data['gname'],FILTER_SANITIZE_STRING );
	$gaddress=filter_var( $data['gaddress'],FILTER_SANITIZE_STRING);
	$gemail=filter_var( $data['gemail'],FILTER_SANITIZE_STRING);
	$gphone_no=filter_var($data['gphone'],FILTER_SANITIZE_STRING);
	$gorderlist=filter_var($data['gorder'],FILTER_SANITIZE_STRING);
	$gcost=filter_var($data['gcost'],FILTER_SANITIZE_STRING);
	$insert= 'insertion';
	if(!strcasecmp($urlparam, $insert))
	{
		global $db;
		$db= new MyDb();
		$GuestEntry=SetGuestEntry($gname, $gaddress, $gemail, $gphone_no, $gorderlist, $gcost);
		return $response->withStatus(200)->withJson($GuestEntry);
	}
	else 
	{
		return $response->write('Stay Away');
	}
});
function SetGuestEntry($name, $address, $email, $phone_no, $orderlist,$cost)
{
	global $db;
	$i =1;
	$qry1= "Insert into tb_guest( name, address, email, phone_no ) values(  '$name', '$address', '$email', '$phone_no' )";
	$res =$db->query($qry1);
		
		$t=date("YY:MM:DD h:i:s");
		$sts='Not_Delivered';
		$cli= '-1';
        $qry2="Insert into tb_order(client_id,sts,cost,orderlist,address,ordertime,guest_email )values('$cli','$sts','$cost','$orderlist','$address','$t','$email')";
		$res2=$db->query($qry2);		
	    $success= 'Successful' ;
	    return $success;
}
$app->run();
?>