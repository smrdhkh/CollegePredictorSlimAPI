<?php

$ch = curl_init();
$data_to_post=array();
$code=$_POST["txtcode"];

curl_setopt($ch, CURLOPT_URL,"http://localhost/deliccio_api/selection.php");
curl_setopt($ch, CURLOPT_POST,sizeof($data_to_post) );
curl_setopt($ch, CURLOPT_POSTFIELDS,$code);

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
$decoded1 = json_decode($server_output,true);
if ( isSet($decoded1->response->status)&&$decoded1->response->status == 'ERROR' )
{
	die('error occured: '.$decoded1->response->error_message);
}
echo "response ok";

?>