<?php
require_once("DatabaseObject.php");
require_once("database.php");


class attendance extends DatabaseObject{

    protected static $table_name="attendance";
    protected static $db_fields = array('userID','confID');

    public $userID;
    public $confID;




} 