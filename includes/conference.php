<?php

require_once("database.php");
require_once("DatabaseObject.php");


class conference extends DatabaseObject{


    protected static $table_name="conference";
    protected static $db_fields = array('ID' ,'confName' ,'orgID' ,'Location' ,'confDate' ,'confSubmitEnd' ,'confReviewEnd' ,'introduction' ,'isApproved' ,'photoURL');

    public $ID;
    public $confName;
    public $orgID;
    public $Location;
    public $confDate;
    public $confSubmitEnd;
    public $confReviewEnd;
    public $introduction;
    public $isApproved;
    public $photoURL;

} 