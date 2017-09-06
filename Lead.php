<?php
class Lead{
        //this is the class of every individual lead
        //every time an object is instantiated it represents a single lead
        //
	//class attributes
	public $BusinessName;

	//class construct
	public function __construct($name){
		$this->setBusinessName($name);
	}
        
        public function setBusinessName($name){
               $this->BusinessName=$name;
        }
	
	public function getBusinessName(){
		return 	$this->BusinessName;
	}
	
}
