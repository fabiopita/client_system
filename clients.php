<?php
try {
	$mongo = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $query = new MongoDB\Driver\Query([], ['sort' => [ 'name' => 1], 'limit' => 5]);

    $rows = $mongo->executeQuery("dataBase.clients", $query);    

    foreach ($rows as $row) {
		echo "$row->name : $row->profession \n";
        //echo $row->name ;

    }
} catch (MongoDB\Driver\Exception\Exception $e) {
   $filename = basename(__FILE__);

   echo "Erro no arquivo", $filename."\n";

   echo "Exception:", $e->getMessage(), "\n";

   echo "Arquivo:", $e->getFile(), "\n";

   echo "Linha:", $e->getLine(), "\n";    

}

?>