<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/paper.php");



if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"])){
    redirect_to("index.php");
}

$paper = new paper();
$paper->ID = $_GET["ID"];
$paper->isAccepted = 1;

if($paper->save()){
    redirect_to("confList.php");
}else{
    redirect_to("index.php");
}