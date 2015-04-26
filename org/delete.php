<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/conference.php");



if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"])){
    redirect_to("index.php");
}

$conf = conference::find_by_id($_GET["ID"]);


if($conf->delete()){
    redirect_to("confdelete.php");
}else{
    redirect_to("index.php");
}