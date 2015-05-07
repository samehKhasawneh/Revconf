<?php

require_once("DatabaseObject.php");
require_once("database.php");

class user extends DatabaseObject{

    protected static $table_name="user";
    protected static $db_fields =
        array('ID', 'title', 'FirstName', 'LastName', 'gender', 'Email', 'Password','scientific_degree', 'date_registered', 'city', 'isAdmin');

    public $ID;
    public $title;
    public $FirstName;
    public $LastName;
    public $gender;
    public $Email;
    public $Password;
    public $scientific_degree;
    public $date_registered;
    public $city;
    public $isAdmin;


    public static function authenticate($email="", $password="") {
        global $database;

        $email = $database->escape_value($email);
        $password = $database->escape_value($password);

        $sql  = "SELECT * FROM user ";
        $sql .= "WHERE `Email` = '{$email}' ";
        $sql .= "AND `Password` = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

}

?>