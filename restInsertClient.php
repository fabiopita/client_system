<?php
$mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');   
$bulk  = new MongoDB\Driver\BulkWrite;


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $doc = ['_id' => new MongoDB\BSON\ObjectID, 'name' => $_REQUEST['name'], 'profession' => $_REQUEST['profession']];       

    $bulk->insert($doc);
	$mongo->executeBulkWrite('dataBase.clients', $bulk);
    
	$json = array("status" => 1, "msg" => "Done User added!");
} else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
} 
header('Content-type: application/json');
echo json_encode($json);
?>