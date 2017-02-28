<?php
//just for testing class
Class MyClass{

	public $name;
	public $age;
	public $stage;
	
	public function __construct($name="", $age="", $stage=""){
		$this->name="jaber";
		$this->age="29";
		$this->stage="first page";
	}
}


$guy = new MyClass();
foreach($guy as $key => $value){
echo "$value\n";
}
?>