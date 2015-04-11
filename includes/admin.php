<?php
require_once("DatabaseObject.php");

class admin extends DatabaseObject {

    protected static $table_name="users";
    protected static $db_fields = array('id', 'email', 'password', 'first_name', 'last_name');

    public $username;
    public $password;


    public static function authenticate($username="", $password="") {
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);

        $sql  = "SELECT * FROM admin ";
        $sql .= "WHERE username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

} 