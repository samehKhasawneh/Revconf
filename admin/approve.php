<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/conference.php");



if(!isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]==1){
    redirect_to("./../login.php");
}
if(!isset($_GET["ID"])){
    redirect_to("index.php");
}

$conference = conference::find_by_id($_GET["ID"]);

$conference->isApproved = 1;

if($conference->save()){
    redirect_to("confRequests.php");
}else{
    redirect_to("index.php");
}