<?php
$mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');   
$bulk  = new MongoDB\Driver\BulkWrite;


if ($_SERVER['REQUEST_METHOD'] == "POST"){
 	
	$filter = ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])];  		
	
	$doc = ['name' => $_POST['name'], 'profession' => $_POST['profession']];
	$bulk->update($filter, $doc, []);

	$mongo->executeBulkWrite('dataBase.clients', $bulk);
	
	$json = array("status" => 2, "msg" => "Done User updated!");
} else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
} 
header('Content-type: application/json');
echo json_encode($json);
?>