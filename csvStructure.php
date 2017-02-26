<?php


class csvStructure{
    
        //attributes
    	public $fileName;
	public $fileType;
	public $tempName;
	public $error;
	public $fileSize;
        
        //construct
        public function __construct(array $file) {
            $this->fileName=$file['uploadFile']['name'];
            $this->fileType=$file['uploadFile']['type'];
            $this->tempName=$file['uploadFile']['tmp_name'];
            $this->error=$file['uploadFile']['error'];
            $this->fileSize=$file['uploadFile']['size'];
        }
        
        //function that checks the file type  
        public function isRightFileType($fType){
        $phrases=explode(".",$this->fileName);
            if($fType==end($phrases)){
                return TRUE;
            }else{
                return FALSE;
            }

        }
        
        //function that uploads a file
        public function uploadFile(){
            $result = move_uploaded_file ($this->tempName, __DIR__."/csv/{$this->fileName}");
            return $result;
        }
        
        //returns an array of objects with Businesses details
        public function getLeads(){
            
           $leadsArrayOfObjects = array();
            if (($handle = fopen(__DIR__."/csv/{$this->fileName}", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 50, "\n")) !== FALSE) {
                    $num = count($data);
                    for ($i=0; $i<$num; $i++){
                        $csvLead = new Lead($data[$i]);
                        array_push($leadsArrayOfObjects, $csvLead);
                    }  
                }
            }
            fclose($handle);
            return $leadsArrayOfObjects;
        }
}




