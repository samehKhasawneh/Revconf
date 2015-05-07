<?php
require_once("DatabaseObject.php");
require_once("database.php");


class reviewresults extends DatabaseObject
{

    protected static $table_name = "reviewresults";
    protected static $db_fields = array('paperID', 'userID', 'recommendation', 'userFamiliarity', 'strengthWeakness', 'mainProblems', 'comments', 'rank');

    public $paperID;
    public $userID;
    public $recommendation;
    public $userFamiliarity;
    public $strengthWeakness;
    public $mainProblems;
    public $comments;
    public $rank;


    public static function find_comments_on($paperID = 0)
    {
        global $database;
        $sql = "SELECT recommendation, strengthWeakness, mainProblems, comments  FROM " . self::$table_name;
        $sql .= " WHERE paperID =" . $database->escape_value($paperID);
        $sql .= " ORDER BY userID ASC";
        return self::find_by_sql($sql);
    }

}
?>