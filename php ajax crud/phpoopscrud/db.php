<?php
error_reporting(E_ERROR | E_PARSE);

class database{

    public $totalrecords;
    public $que;
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='phpajaxcrud';
    private $result=array();
    private $mysqli='';
    
    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }

    public function countRecords(){
        $sql = "SELECT COUNT(id) FROM users";
        $result2 = $this->mysqli->query($sql);
        // print_r($result2);
        while ($r = mysqli_fetch_array($result2)) {
            $this->totalrecords = $total_rec =  $r[0]."<br>";
        }
    }
    
    

    public function insert($table,$para=array()){
        
            
                
                    $table_columns = implode(",", array_keys($para));
                    $table_value = implode("','", $para);

        

                    $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

                    $result = $this->mysqli->query($sql);
                    echo json_encode($para);
        
            
    

        
    }
    public function select($table,$rows="*",$where = null, $sort = null, $limit=null){
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where $sort" ;
        }else{
            $sql="SELECT $rows FROM $table ORDER BY $sort $limit";
        }

        $this->sql = $result = $this->mysqli->query($sql);
        
    }

    public function delete($table,$id){
        $sql="DELETE FROM $table  WHERE $id ";
        
        $result = $this->mysqli->query($sql);
    }


    public function update($table,$para=array(),$id){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }

        $sql="UPDATE  $table SET " . implode(',', $args);

        $sql .=" WHERE $id";

        $result = $this->mysqli->query($sql);
        echo json_encode($para);
    }

    public function selectone($table,$rows="*",$where = null){
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
        echo json_encode($rows);
    }
}

?>