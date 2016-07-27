<?php 
require 'vendor/autoload.php';
$config['displayErrorDetails']=true;
$app =new Slim\App(["settings"=>$config]);

class MyDb extends SQLite3
{
	function __construct()
	{
		$this->open('data4.db');
	}
	function closeDb()
	{
		$this->close();
	}
};

$db = NULL;
$i = 0;
$app->post('/SS',function( $request, $response, $args ){
	
	$data= $request->getParsedBody();
    $cat = filter_var($data['category'],FILTER_SANITIZE_STRING);
    $allIndiaRank = filter_var($data['allIndia'],FILTER_SANITIZE_STRING);
    $catRank =filter_var($data['catRank'],FILTER_SANITIZE_STRING);
    $state = filter_var($data['state'],FILTER_SANITIZE_STRING);

	global $db;
	$db =new MyDb();
	
	global $i;
	
	$inState = array();
    $inState = getHomeState($cat, $allIndiaRank,$catRank, $state );
	
	$outState = array();
    $outState = getOtherState($cat, $allIndiaRank,$catRank, $state );
	
	$status="BAD";
	if ( $inState || $outState )
		$status = "Good";
	
	$result = array( 'Status'=>$status, 'InState'=>$inState, 'outState'=>$outState, 'TotalColleges'=>$i );
    return	$response->withStatus(200)->withJson($result);
});

function getHomeState( $cat, $allIndiaRank, $catRank, $state )
{
	global $db;
	$qry = "SELECT * from ranks where nstate LIKE '%".$state."%'";
	$result = $db->query($qry);
	
	global $i;
	$row= array();
	while ( $res = $result->fetchArray(SQLITE3_ASSOC) )
	{
		if ( $res['HS'] >= $catRank && $res['prevHS'] >=$allIndiaRank )
		{
			if ( array_key_exists( $res['college'],$row ) )
			{
				array_push( $row[$res['college']],$res['branch'] );
			}
			else
			{
				$i++;
				$row[$res['college']] = array();
				array_push( $row[$res['college']],$res['branch'] );
			}
		}
	}
	
	return $row;
}

function getOtherState( $cat, $allIndiaRank, $catRank, $state )
{
	global $db;
	$qry = "SELECT * from ranks where nstate NOT LIKE '%".$state."%'";
	$result = $db->query($qry);
	
	global $i;
	$row= array();
	while ( $res = $result->fetchArray(SQLITE3_ASSOC) )
	{
		if ( $res['OS'] >= $catRank && $res['prevOS'] >=$allIndiaRank )
		{
			if ( array_key_exists( $res['college'],$row ) )
			{
				array_push( $row[$res['college']],$res['branch'] );
			}
			else
			{
				$i++;
				$row[$res['college']] = array();
				array_push( $row[$res['college']],$res['branch'] );
			}
		}
	}	
	return $row;
}

$app->run();