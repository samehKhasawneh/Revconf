<?php
require_once("database.php");
require_once("DatabaseObject.php");


class evaluationresult extends DatabaseObject{

    protected static $table_name="evaluationresult";
    protected static $db_fields=array('paperID', 'userID', 'eval1', 'eval2', 'eval3', 'eval4', 'eval5', 'eval6', 'eval7', 'eval8', 'eval9', 'eval10',);

    public $paperID;
    public $userID;
    public $eval1;
    public $eval2;
    public $eval3;
    public $eval4;
    public $eval5;
    public $eval6;
    public $eval7;
    public $eval8;
    public $eval9;
    public $eval10;



}
