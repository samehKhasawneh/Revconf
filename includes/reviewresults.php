<?php
require_once("DatabaseObject.php");
require_once("database.php");
require_once('C:\wamp\www\Revconf\includes\phpMailer-master/class.phpmailer.php');
require_once('C:\wamp\www\Revconf\includes\phpMailer-master/class.smtp.php');

class reviewresults extends DatabaseObject{

    protected static $table_name="reviewresults";
    protected static $db_fields=array('paperID', 'userID', 'recommendation', 'userFamiliarity', 'strengthWeakness', 'mainProblems', 'comments');

    public $paperID;
    public $userID;
    public $recommendation;
    public $userFamiliarity;
    public $strengthWeakness;
    public $mainProblems;
    public $comments;


    public static function find_comments_on($paperID=0) {
        global $database;
        $sql = "SELECT recommendation, strengthWeakness, mainProblems, comments  FROM " . self::$table_name;
        $sql .= " WHERE paperID =" .$database->escape_value($paperID);
        $sql .= " ORDER BY id ASC";
        return self::find_by_sql($sql);
    }

    public function try_to_send_notification() {
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->Host     = "your.host.com";
        $mail->Port     = 25;
        $mail->SMTPAuth = false;
        $mail->Username = "your_username";
        $mail->Password = "your_password";

        $mail->FromName = "RevConf";
        $mail->From     = "";
        $mail->AddAddress("", "RevConf Admin");
        $mail->Subject  = "New Review Comment";
        $mail->Body     =<<<EMAILBODY

A new reviewer comments on  you paper.

wrote:

{$this->comments}

EMAILBODY;

        $result = $mail->Send();
        return $result;

    }

}
?>