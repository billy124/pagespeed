<?php
class Lead{
        //this is the class of every individual lead
        //every time an object is instantiated it represents a single lead
        //
	//class attributes
	public $BusinessName;

	//class construct
	public function __construct($name){
		$this->BusinessName=$name;
	}
        
        /*public function setName($name){
               $this->BusinessName=$name;
        }*/
	
}
