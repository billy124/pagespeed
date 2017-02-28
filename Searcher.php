<?php
require(__DIR__.'/Dao.php');
require(__DIR__.'/GoogleScore.php');
require(__DIR__.'/TableDrawer.php');
//the following line is to imitate the form input
$searchText = $_POST["searchText"];
if(empty($searchText)){
    echo "please insert a value in text field,,, this should be in a jax"; die;
}

/*initiates a google score object to assign to it the returned record from the 
Dao*/
$googleScoreObj = new GoogleScore();
$fetchDb = new Dao("localhost", "root", "addpeople", "csvTest");
$googleScoreObj = $fetchDb->getGoogleScoreRecord($searchText);
        


if($googleScoreObj==FALSE){
    echo "no record found";
}else{
    $tableDrawer = new TableDrawer($googleScoreObj);
    $tableDrawer->drawTable();
}



