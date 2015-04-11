<?php

require_once("DatabaseObject.php");
require_once("database.php");

class user extends DatabaseObject{

    protected static $table_name="users";
    protected static $db_fields = array('id', 'email', 'password', 'first_name', 'last_name');

    public $id;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $link;
    public $gender;


    public function full_name() {
        if(isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        } else {
            return "";
        }
    }

    public static function authenticate($email="", $password="") {
        global $database;

        $email = $database->escape_value($email);
        $password = $database->escape_value($password);

        $sql  = "SELECT * FROM user ";
        $sql .= "WHERE `email` = '{$email}' ";
        $sql .= "AND `password` = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);

        return !empty($result_array) ? array_shift($result_array) : false;
    }

}

?>