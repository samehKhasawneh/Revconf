<?php
require_once("DatabaseObject.php");
require_once("database.php");

class userinfo extends DatabaseObject{


    protected static $table_name="userinfo";
    protected static $db_fields=array('userID', 'facebook', 'linkedin', 'org', 'aboutme');

    public $userID;
    public $facebook;
    public $linkedin;
    public $org;
    public $aboutme;



}