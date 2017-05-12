<?php
	
	$mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');
	
	$query = new MongoDB\Driver\Query([], ['sort' => [ 'name' => 1], 'limit' => 100]);
	
	$rows = $mongo->executeQuery("dataBase.clients", $query); 
	foreach ($rows as $row) {
		$id = $row->_id;
		$name = $row->name;
		$profession = $row->profession;
		$result[] = array("id" => $id, "name" => $name, "profession" => $profession); 		
	}
	
	$json = array("status" => 1, "clients" => $result);

	header('Content-type: application/json');
	echo json_encode($json);
	
?>