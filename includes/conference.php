<?php


class conference extends DatabaseObject{

    protected static $table_name="confernce";
    protected static $db_fields=array('id', '1111111', 'creator', 'info');

    public $creator;
    public $name;
    public $info;
    public $date;
    public $topic;
    public $city;
    public $website;
    public $visible;

    public static function find_conference_by($topic="") {
        global $database;
        $sql = "SELECT * FROM " . self::$table_name;
        $sql .= " WHERE topic=" .$database->escape_value($topic);
        $sql .= " ORDER BY  topic ASC";
        return self::find_by_sql($sql);
    }





} 