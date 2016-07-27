<?php 
require 'vendor/autoload.php';

$config['displayErrorDetails'] = true;
$app = new Slim\App(["settings" => $config]);

$app->post( '/hello/{name}',function( $request, $response )
	{
		$name = $request->getAttribute('name');
		$response->getBody()->write( "$name" );
		return $response;
	} );
	
	$app->run();
?>