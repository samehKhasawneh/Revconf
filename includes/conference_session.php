<?php
require_once("./database.php");
require_once("./DatabaseObject.php");

class conference_session extends DatabaseObject {

    protected static $table_name="sessions";
    protected static $db_fields=array('id', 'content', 'confernceid' , 'time');

    public $time;
    public $content;
    public $chair;
    public $paper_id;





}