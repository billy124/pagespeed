<?php



class Dao{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $connection;
    
    //construct
    public function __construct($host, $user, $pass, $db) {
        $this->servername=$host;
        $this->username=$user;
        $this->password=$pass;
        $this->dbname=$db;
    }
    
    //functions
    public function insertNewRecords($leadsArrayOfObjects){
        $this->openConnection();
        $max= sizeof($leadsArrayOfObjects);
        $sumRecords=0;
        for($i=0;$i<$max;$i++){
            $sql = "INSERT INTO leads (leadURL) VALUES ('".$leadsArrayOfObjects[$i]->BusinessName."')";
            if ($this->connection->query($sql) === FALSE) {
		echo "Error: " . $sql . "<br>" . $this->connection->error;
                die;
            }else{
                $sumRecords++;
            }
        }
        return $sumRecords;
        $this->closeConnection();
    }
    
    public function getGoogleScoreRecord($searchText){
        $this->openConnection();
        $sql="SELECT * FROM google_score where google_score.url = '".$searchText."'";
        
        
        $result = $this->connection->query($sql);
        
        if($result){
            
            $row = $result->fetch_row();
            if(empty($row)){return FALSE;}
            
            /*echo "<pre>";
            print_r($row);
            echo "</pre>";*/
            
            $googleScoreObj = new GoogleScore($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
           
            return $googleScoreObj;
        }else{
            return FALSE;
        }
    }
    
    public function openConnection(){
        $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($this->connection->connect_errno){
            echo "Connection failed badly. I mean really Bad!";
            die;
        }
    }
    
    public function closeConnection(){
        $this->connection->close();
    }
}