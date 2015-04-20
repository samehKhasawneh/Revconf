<?php
require_once("database.php");
require_once("DatabaseObject.php");

class conference_session extends DatabaseObject {

    protected static $table_name="sessions";
    protected static $db_fields=array('confID', 'sessionID', 'sessionType' , 'Chair', 'sessionInfo');

    public $confID;
    public $sessionID;
    public $sessionType;
    public $Chair;
    public $sessionInfo;


}