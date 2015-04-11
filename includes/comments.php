<?php
require_once("./database.php");
require_once('C:\wamp\www\Revconf\includes\phpMailer-master/class.phpmailer.php');
require_once('C:\wamp\www\Revconf\includes\phpMailer-master/class.smtp.php');

class comments extends DatabaseObject{

    protected static $table_name="comments";
    protected static $db_fields=array('id', 'paper_id', 'author', 'link');

    public $id;
    public $paper_id;
    public $author;
    public $body;

    public static function make($paper_id, $author="", $body="") {
        if(!empty($paper_id) && !empty($author) && !empty($body)) {
            $comment = new comments();
            $comment->paper_id = (int)$paper_id;
            $comment->author = $author;
            $comment->body = $body;
            return $comment;
        } else {
            return false;
        }
    }

        public static function find_comments_on($paper_id=0) {
            global $database;
            $sql = "SELECT * FROM " . self::$table_name;
            $sql .= " WHERE paper_id=" .$database->escape_value($paper_id);
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

{$this->body}

EMAILBODY;

        $result = $mail->Send();
        return $result;

    }

}

?>