<?php
require_once("DatabaseObject.php");
require_once("database.php");

class paper extends DatabaseObject{

    protected static $table_name="paper";
    protected static $db_fields=array('ID', 'userID', 'dateSubmitted', 'paperURL', 'isaccepted');

    public $ID;
    public $userID;
    public $dateSubmitted;
    public $paperURL;
    public $isaccepted;

    public function comments() {
        return reviewresults::find_comments_on($this->ID);
    }
} 