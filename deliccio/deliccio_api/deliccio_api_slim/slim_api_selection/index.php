<?php
require 'vendor/autoload.php';

$configure['displayErrorDetails'] = true;
$app = new Slim\App(["settings"=>$configure]);

class MyDb extends SQLite3{
	function __construct(){
		$this->open("deliccio.db");
	}
	function closeDb()
	{
		$this->close();
	}
};

$db=NULL;

$app->post( '/SS', function( $request, $response, $args ){
	$data= $request->getParsedBody();
	$urlParam=filter_var( $data['name'], FILTER_SANITIZE_STRING );
	$select = 'selection';
	if ( !strcasecmp( $urlParam, $select ) )
	{
	   global $db;
       $db=new MyDb();
	   $itemArray = array();
       $itemArray = getItem();
       return $response->withStatus(200)->withJson( $itemArray );
	}
	else
	{
		return $response->write( "Stay Away" );
	}
});

function getItem()
{
	global $db;
	$qry = "Select * from tb_item order by category";
	$res = $db->query($qry);
	$row = array();
	while ( $r = $res->fetchArray(SQLITE3_ASSOC) )
	{
		if ( $r['avail']=='Available' ) {
	       $row[$r['id']] = array();
		   array_push( $row[$r['id'] ], $r['name'] );
		   array_push( $row[$r['id'] ], $r['cost'] );
		   array_push( $row[$r['id'] ], $r['category'] );
		}
	}
	return $row;
}

$app->run();
?>