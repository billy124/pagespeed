<?php
require(__DIR__.'/initializer.php');

Class csvConverter{
	public function processCsv($csvObj){
	//iterate through the csvObject's elements and insert each record in to the db individually.
	foreach($csvObj as $key => $value){
	//call the connection method from the dao and insert the value into the db
	
	}
}
}
?>