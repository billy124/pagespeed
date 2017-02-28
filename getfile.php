<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
require(__DIR__.'/csvStructure.php');
require(__DIR__.'/Lead.php');
require(__DIR__.'/Dao.php');

//illustration printing statement. prints the file structure 
echo "<pre>";
print_r($_FILES);
echo "</pre>";


//make sure $_FILES array is not empty.
if(!empty($_FILES)){
    $structureObj = new csvStructure($_FILES);   
}else{/*throw error here*/}

//checks if directory exists
$isDir=FALSE;
if(is_dir(__DIR__."/csv/"))
{$isDir= TRUE;
echo "<br>Directory exists indeed!";
}
   
//check if file is the right type
$isRightType = FALSE;   
if($structureObj->isRightFileType("csv")){
    $isRightType = TRUE;
    echo "<br>File type is correct == true";
}
     
   
if($isRightType&&$isDir){
    if($structureObj->uploadFile()){//attempts to upload the file and returns true if successful
        echo "<br><br>file uploaded successfully";
        $leadsArrayOfObjects=$structureObj->getLeads();
        $fillDb = new Dao("localhost", "root", "addpeople", "csvTest");
        $sumRecords=$fillDb->insertNewRecords($leadsArrayOfObjects);
        echo "<br><br>============<br>".$sumRecords.": created";
    }else{
        echo "<br><br>upload failed";
    }
}



?>
</body>
</html>
