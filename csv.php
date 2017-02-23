<?php
require(__DIR__.'/initializer.php');
class csv{

	//class attributes
	public $name;
	public $appType;
	public $tempName;
	public $error;
	public $size;
	
	//class construct
	public __construct($file){
		$this->setFields($file);
	}
	
	private function setFields($file){ 
		$this->name = $file['name'];
		$this->appType=$file['type'];
		$this->tempName=$file['temp_name'];
		$this->error=$file['error'];
		$this->size=$file['size'];
	}
	
	//possible enhancement: class setters and getters if we declared the attributes private would be helpful.
	
}

?>