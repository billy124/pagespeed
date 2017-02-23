<html>
<head>
<title>Process Uploaded File</title>
</head>
<body>
<?php
require(__DIR__.'/initializer.php');
/*
$servername = "localhost";
$username = "jaber";
$password = "addpeople1";
$dbname = "csvTest";
*/

echo "<pre>";
print_r($_FILES);
echo "</pre>";

$result = move_uploaded_file ($_FILES['uploadFile'] ['tmp_name'], __DIR__."/csv/{$_FILES['uploadFile'] ['name']}");

//if file was uploaded create object of cvs class and initialize its vars with the file array
if($result){
	$csvObj = new csv($_FILES['uploadFile']);
	
	//send the csvObj to the csvConverter to process it and insert ints content into the db
	$csvConv = new csvConverter();
	}

//file handling and sending sending to browser then sending to db
$row = 1;
if (($handle = fopen(__DIR__."/csv/{$_FILES['uploadFile'] ['name']}", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 50, "\n")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
			//here is where the data will be inserted into the db
			$connection = new mysqli($servername,$username,$password,$dbname);


			if($connection->connect_errno){

			echo "Connection failed badly. I mean really Bad!";

			}
			else{
			//echo "Connection successful";
			$sql = "INSERT INTO leads (leadURL) VALUES ('".$data[$c]."')";
			}
			if ($connection->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $connection->error;
			}

			$connection->close();
				
			//db part finish
        }
    }
    fclose($handle);
}



?>
</body>
</html>
