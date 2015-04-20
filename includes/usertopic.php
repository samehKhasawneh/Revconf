<?php
require_once("DatabaseObject.php");
require_once("database.php");

class usertopic extends DatabaseObject{

    protected static $table_name="usertopic";
    protected static $db_fields=array('TopicID', 'userID');

    public $TopicID;
    public $userID;
   

} 