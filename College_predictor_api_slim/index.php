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

/******* My Additions***********/

$app->post('/',function($request, $response, $args) {
	$response ->write("Stay Away!!");
	return $response;
});
/********Class To connect/Disconnect SQLite Database**************/
class MyDB extends SQLite3{
		function __construct() {
			$this->open('database.db');
		}	
		function closeDB(){
			$this->close();
		}
};
$db=null;  //Global Database object
$i=0;
/************ POST Route to Data *****************/
$app->post('/SS',function($request, $response, $args) {
	$data = $request->getParsedBody();						// Get posted Data
    $rank= filter_var($data['rank'], FILTER_SANITIZE_STRING);	// Filter One by one
    $cat= filter_var($data['cat'], FILTER_SANITIZE_STRING);
	$Nplace = filter_var($data['Native'],FILTER_SANITIZE_STRING);
	global $db;			// Refer global Database object
	$db= new MyDB();	// Initialize and open Database;
	$InStateData= array();		//InState Data Multidimentional Array
	$InStateData=GetFromHomeState($Nplace,$rank,$cat);  //Call to GetFromHomeState function to get InState Data
	global $i;
	$OutStateData=array();
	$OutStateData=GetFromOutState($Nplace,$rank,$cat);		// Define this function to get Data of OutState Colleges

	if($InStateData || $OutStateData) $status ="Good";
	else $status="Bad";
	$result=array('Status'=>$status,"Instate"=>$InStateData,"OutState"=>$OutStateData,"TotalCollege"=>$i);
	$db->closeDB();
	return $response->withStatus(200)
					->withJson($result);
	
});
/***********************Function To get Home State Colleges Data*****************/
function GetFromHomeState($StateName,$rank,$cat){
	global $db;			// Refer Global Database object
	$sql="SELECT * FROM ranks WHERE nstate LIKE '%" . $StateName . "%'";		//Query to get Home state matched Data only
	$result = $db->query($sql);
	global $i;
	$row = array();
	while($res = $result->fetchArray(SQLITE3_ASSOC)){					//Fetch Row one by one
		if(!strcasecmp($res['category'],$cat)){							//Compare Ignoring cases, don't use simple equal to operator				
			if($res['HS']>=$rank){
				if (array_key_exists($res['college'], $row)){				// Check whether Key exists or not
					array_push($row[$res['college']],$res['branch']);		// Push value for the key if exist
				} else {
					$i++;
					$row[$res['college']]=array();							//If not, Create it and push the first value
					array_push($row[$res['college']],$res['branch']);
				}
			}		
		}		
	}
	return $row;
}

function GetFromOutState($StateName,$rank,$cat){
	global $db;			// Refer Global Database object
	$sql="SELECT * FROM ranks WHERE nstate NOT LIKE '%" . $StateName . "%'";		//Query to get Home state matched Data only
	$result = $db->query($sql);
	/***********Start your Code ********************/
	$row = array();
	global $i;
	while($res = $result->fetchArray(SQLITE3_ASSOC)){					//Fetch Row one by one
		if(!strcasecmp($res['category'],$cat)){							//Compare Ignoring cases, don't use simple equal to operator				
			if($res['OS']>=$rank){
				
				if (array_key_exists($res['college'], $row)){				// Check whether Key exists or not
					array_push($row[$res['college']],$res['branch']);		// Push value for the key if exist
				} else {
					$i++;
					$row[$res['college']]=array();							//If not, Create it and push the first value
					array_push($row[$res['college']],$res['branch']);
				}
			}		
		}		
	}
	return $row;
}

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>