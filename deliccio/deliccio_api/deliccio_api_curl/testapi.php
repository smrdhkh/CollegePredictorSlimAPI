<?php

$url="http://localhost/deliccio_api/index.php";

$data_to_post=array();
$name=$_POST["txtname"];
$address=$_POST["txtaddress"];
$email=$_POST["txtemail"];
$phone_no=$_POST["txtphone_no"];
$orderlist=$_POST["txtorderlist"];
$cost=$_POST["txtcost"];
$code=$_POST["txtcode"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, sizeof($data_to_post));
curl_setopt($ch, CURLOPT_POSTFIELDS,"name=$name&address=$address&email=$email&phone_no=$phone_no&orderlist=$orderlist&cost=$cost&code=$code");


// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

echo $server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....


?>