<?php
require_once("DatabaseObject.php");
require_once("database.php");

class userimgs extends DatabaseObject {

    protected static $table_name="userimgs";
    protected static $db_fields=array('userID', 'imageURL');

    public $userID;
    public $imageURL;




} 