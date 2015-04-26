<?php
require_once("DatabaseObject.php");
require_once("database.php");

class paper extends DatabaseObject{

    protected static $table_name="paper";
    protected static $db_fields=array('ID', 'userID', 'confID', 'paperName', 'abstract', 'paperTopic', 'dateSubmitted', 'paperURL', 'isAccepted');

    public $ID;
    public $userID;
    public $confID;
    public $paperName;
    public $abstract;
    public $paperTopic;
    public $dateSubmitted;
    public $paperURL;
    public $isAccepted;

    public function comments() {
        return reviewresults::find_comments_on($this->ID);
    }
} 