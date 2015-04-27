<?php
require_once("../includes/session.php");
require_once("../includes/functions.php");
?>
<?php
$session->logout();
redirect_to("./../login.php");
?>
