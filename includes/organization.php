<?php
require_once("DatabaseObject.php");
require_once("database.php");

class organization extends DatabaseObject{

    protected static $table_name="organization";
    protected static $db_fields=array('ID', 'orgName', 'orgEmail', 'orgPassword', 'website', 'orgDate');

    public $ID;
    public $orgName;
    public $orgEmail;
    public $orgPassword;
    public $website;
    public $orgDate;




    public static function authenticate($email="", $password="") {
        global $database;

        $email = $database->escape_value($email);
        $password = $database->escape_value($password);

        $sql  = "SELECT * FROM organization ";
        $sql .= "WHERE `orgEmail` = '{$email}' ";
        $sql .= "AND `orgPassword` = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }


} 