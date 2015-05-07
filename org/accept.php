<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/paper.php");



if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"]) || !isset($_GET["confID"])){
    redirect_to("index.php");
}

$paper = paper::find_by_id($_GET["ID"]);

$paper->isAccepted = 1;

if($paper->save()){
    redirect_to("paper.php?ID={$_GET["confID"]}");
}else{
    redirect_to("confStat.php?ID={$_GET["confID"]}");
}