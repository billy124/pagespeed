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
		echo "Error: " . $sql . "<br>" . $connection->error;
            }else{
                $sumRecords++;
            }
        }
        return $sumRecords;
        $this->closeConnection();
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