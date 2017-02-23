<?php
require(__DIR__.'/initializer.php');
class csv{

	//class attributes
	public $name;
//	public $appType;
//	public $tempName;
//	public $error;
//	public $size;
	
	//class construct
	public function __construct(){
		$this->name="";
//                $this->appType="";
//                $this->tempName="";
//                $this->error=0;
//                $this->size=0;
	}
        
        public function setName($name){
               $this->name=$name;
        }
	
	//possible enhancement: class setters and getters if we declared the attributes private would be helpful.
	
}

?>