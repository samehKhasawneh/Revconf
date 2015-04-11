<?php
require_once("config.php");
require_once("database.php");

class session {

    private $logged_in = false;
    private $admin_logged_in = false;
    public $isAdmin;
    public $userID;
    public $message;

    function __construct() {
        session_start();
        $this->check_message();
        $this->check_login();
        if($this->logged_in) {
            // actions to take right away if user is logged in
            $this->check_admin();
        } else {
            // actions to take right away if user is not logged in
        }
    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login() {
        // database should find user based on username/password
        if(isset($_SESSION['UserID'])){

            $this->userID = $_SESSION['UserID'];
            $this->logged_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['UserID']);
        unset($this->userID);
        $this->logged_in = false;
    }

    public function message($msg="") {
        if(!empty($msg)) {
            // then this is "set message"
            $_SESSION['message'] = $msg;
        } else {
            // then this is "get message"
            return $this->message;
        }
    }

    private function check_admin (){
        if(isset($_SESSION['isAdmin'])) {
            $this->isAdmin = $_SESSION['isAdmin'];
            $this->admin_logged_in = true;
        } else {
            unset($this->userID);
            $this->admin_logged_in = false;
        }

    }

    private function check_login() {
        if(isset($_SESSION['userID'])) {
            $this->userID = $_SESSION['userID'];
            $this->logged_in = true;
        } else {
            unset($this->userID);
            $this->logged_in = false;
        }
    }

    private function check_message() {
        // Is there a message stored in the session?
        if(isset($_SESSION['message'])) {
            // Add it as an attribute and erase the stored version
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

}

$session = new Session();
$message = $session->message();

?>
