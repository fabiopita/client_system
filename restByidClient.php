<?php
	
	$mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');
 try { 
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$filter = ['_id' => new MongoDB\BSON\ObjectID($_POST['id'])];    	
		$query = new MongoDB\Driver\Query($filter , ['sort' => [ 'name' => 1], 'limit' => 100]);
		$rows = $mongo->executeQuery("dataBase.clients", $query); 
		
		foreach ($rows as $row) {
			$id = $row->_id;
			$name = $row->name;
			$profession = $row->profession;
			$result[] = array("id" => $id, "name" => $name, "profession" => $profession); 		
		}
			
		$json = array("status" => 1, "clients" => $result);
	
			//$json = array("status" => 0, "msg" => "No mobiles found!");
		
	} else {
		$json = array("status" => 0, "msg" => "Request method not accepted");
	}
	
	header('Content-type: application/json');
	echo json_encode($json);
} catch (MongoDB\Driver\Exception\Exception $e) {	
	$json = array("status" => 0, "msg" => "No mobiles found!");
	header('Content-type: application/json');
	echo json_encode($json);
}	
?>