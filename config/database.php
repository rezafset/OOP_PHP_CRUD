<?php 
// include('config.php');

class Database{

    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $dbname = "user_data";

    public $link;
    public $error;
    // Constructor
    public function __construct(){
        $this->connectDB();
    }
    private function connectDB(){
        $this->link =  new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection Failed: ".$this->link->connect_error;
            return false;
        }
    }
    // Read data from Database
    public function select($sql){
        $result = $this->link->query($sql);
        if (!$result) {
            die($this->link->error.__LINE__);
        }elseif($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }  
    }
    // Create Data
    public function insert($sql){
        $insert_data = $this->link->query($sql);
        if ($insert_data) {
            header("Location: index.php?msg=Data Inserted Successfully!!");
        }else{
            die($this->link->error.__LINE__);
        }
    }
    // Update Data
    public function update($sql){
        $update_data = $this->link->query($sql);
        if ($update_data) {
            header("Location: index.php?msg=Data Updated Successfully!!");
        }else{
            die($this->link->error.__LINE__);
        }
    }
    // Delete Data
    public function delete($sql){
        $delete_data = $this->link->query($sql);
        if ($delete_data) {
            header("Location: index.php?msg=Data Deleted Successfully!!");
        }else{
            die($this->link->error.__LINE__);
        }
    }
}




?>