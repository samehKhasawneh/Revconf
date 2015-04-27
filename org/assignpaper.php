<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/paper.php");
require_once("../includes/paperassign.php");


if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"]) || !isset($_GET["confID"]) || !isset($_GET["userID"])){
    redirect_to("index.php");
}

$mysql_datetime = strftime("%Y-%m-%d", time());

$query = "INSERT INTO paperassign (paperID,userID,confID,dateAssigned) ";
$query .= "VALUES ({$_GET["ID"]},{$_GET["userID"]},{$_GET["confID"]},{$mysql_datetime})";

$result = paperassign::execut_by_sql($query);

if($result){
    redirect_to("assign2.php?ID={$_GET["ID"]}&confID={$_GET["confID"]}");
}else{
    redirect_to("assign.php");
}



