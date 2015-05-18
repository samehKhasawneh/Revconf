<?php
require_once("DatabaseObject.php");
require_once("database.php");

class userimgs extends DatabaseObject {

    protected static $table_name="userimgs";
    protected static $db_fields=array('userID', 'imageURL');

    public $userID;
    public $imageURL;

    public function create(){
        global $database;
        $query = "INSERT INTO userimgs(userID,imageURL) VALUES ({$this->userID},'{$this->$imageURL}')";
        if($database->query($query)){
            return true;
        }else {
            return false;
        }

    }
}


