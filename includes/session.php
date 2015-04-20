<?php
require_once("config.php");
require_once("database.php");

class session {

    private $logged_in = false;
    private $is_admin = false;
    public $message;

    function __construct() {
        session_start();
        $this->check_message();
        $this->check_login();
        $this->check_admin();
    }



    public function is_logged_in() {
        return $this->logged_in;
    }

    public function is_admin (){
        return $this->check_admin();
    }

    public function setAttrb($key, $val ) {
            $_SESSION[$key] = $val;
            $this->logged_in = true;

    }

    public function getAttrb($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    public function logout() {
        session_destroy();
        $this->logged_in = false;
        $this->is_admin = false;
    }

    public function message($msg="") {
        if(!empty($msg)) {
            // then this is "set message"
            $this->setAttrb("message",$msg);
        } else {
            // then this is "get message"
            return $this->message;
        }
    }

    private  function check_admin (){
        if(isset($_SESSION["isAdmin"])) {
            return $this->is_admin = true;
        } else {
            return $this->is_admin = false;
        }

    }

    private function check_login() {
        if(isset($_SESSION["userID"])) {
            return $this->logged_in = true;
        } else {
            return $this->logged_in = false;
        }
    }

    private function check_message() {
        // Is there a message stored in the session?
        if(isset($_SESSION["message"])) {
            // Add it as an attribute and erase the stored version
            $this->message = $_SESSION["message"];
            unset($_SESSION["message"]);
        } else {
            $this->message = "";
        }
    }

}

$session = new Session();
$message = $session->message();

?>





