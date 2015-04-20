<?php

require_once("database.php");
require_once("DatabaseObject.php");


class conference extends DatabaseObject{


    protected static $table_name="conference";
    protected static $db_fields = array('ID' ,'confName' ,'orgID' ,'confDate' ,'confSubmitEnd' ,'confReviewEnd' ,'introduction' ,'isapproved' ,'photoURL');

    public $ID;
    public $confName;
    public $orgID;
    public $confDate;
    public $confSubmitEnd;
    public $confReviewEnd;
    public $introduction;
    public $isapproved;
    public $photoURL;

} 