<?php
require_once("database.php");
require_once("DatabaseObject.php");


class conftopic extends DatabaseObject{

    protected static $table_name="conftopic";
    protected static $db_fields=array('TopicID', 'confID');

    public $TopicID;
    public $confID;





} 