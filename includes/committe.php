<?php
require_once("database.php");
require_once("DatabaseObject.php");


class committe  extends DatabaseObject{

    protected static $table_name="committe";
    protected static $db_fields = array('userID','confID');

    public $userID;
    public $confID;




}
