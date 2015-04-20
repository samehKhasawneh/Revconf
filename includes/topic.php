<?php
require_once("DatabaseObject.php");
require_once("database.php");

class topic extends DatabaseObject{

    protected static $table_name="topic";
    protected static $db_fields=array('ID', 'topicName');


    public $ID;
    public $topicName;


} 