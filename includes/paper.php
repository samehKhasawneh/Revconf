<?php
require_once("DatabaseObject.php");
require_once("database.php");

class paper extends DatabaseObject{

    protected static $table_name="paper";
    protected static $db_fields=array('ID', 'userID', 'confID', 'paperName', 'dateSubmitted', 'paperURL', 'isAccepted');

    public $ID;
    public $userID;
    public $confID;
    public $paperName;
    public $dateSubmitted;
    public $paperURL;
    public $isAccepted;

    public function comments() {
        return reviewresults::find_comments_on($this->ID);
    }
} 