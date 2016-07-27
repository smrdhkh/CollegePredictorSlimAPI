<?php

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */
require 'vendor/autoload.php';

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$config['displayErrorDetails'] = true;
$app = new Slim\App(["settings" => $config]);


/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */


$app->get('/hello[/{name}]', function ($request, $response, $args) {
    $response->write("Hello, " . $args['name']);
	
    return $response;
})->setArgument('name', 'World!');

/******* My Additions***********/

$app->post('/',function($request, $response, $args) {
	$response ->write("Posted Welcome Slim");
	
	return $response;
});

$app->post('/key',function($request, $response, $args) {
	$data = $request->getParsedBody();
    $ticket_data = [];
    $ticket_data['title'] = filter_var($data['title'], FILTER_SANITIZE_STRING);
    $ticket_data['description'] = filter_var($data['description'], FILTER_SANITIZE_STRING);
	
	
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('sqlitedb.db');
    }
}
$db = new MyDB();

$result = $db->querysingle('SELECT * from Table where T="x1231"');
//$rr=var_dump($result->fetchArray());
	
	$DateSH=array('file'=>$result);
	return $response->withJson($DateSH);
	
});

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
