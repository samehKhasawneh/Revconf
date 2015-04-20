<?php
require_once("DatabaseObject.php");
require_once("database.php");

class organization extends DatabaseObject{

    protected static $table_name="organization";
    protected static $db_fields=array('ID', 'orgName', 'orgEmail', 'orgPassword', 'orgDate');

    public $ID;
    public $orgName;
    public $orgEmail;
    public $orgPassword;
    public $orgDate;


} 