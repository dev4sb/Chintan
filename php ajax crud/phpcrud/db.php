<?php
error_reporting(E_ERROR | E_PARSE);
    class databse{
        public $que;
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='phpcrud';
        private $result=array();

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        }

        public function insert($table, $para=array()){
            $table_columns = implode(",", array_keys($para));
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES ('$table_value')";
            $result = $this->mysqli->query($sql);
        }

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }
    
            $this->sql = $result = $this->mysqli->query($sql);
        }
    }


?>