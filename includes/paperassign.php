<?php
require_once("DatabaseObject.php");
require_once("database.php");

class paperassign extends DatabaseObject{


    protected static $table_name="paperassign";
    protected static $db_fields=array('paperID', 'userID', 'confID', 'dateAssigned', 'paperURL');

    public $paperID;
    public $userID;
    public $confID;
    public $dateAssigned;
    public $paperURL;



} 