<?php
require_once("includes/session.php");
require_once("includes/attendance.php");
require_once("includes/functions.php");
require_once("includes/database.php");
//require_once("includes/session.php");


if(!isset($_SESSION["ID"]) || !isset($_GET["ID"])){

    redirect_to("index.php");
}
$query = "INSERT INTO attendance (userID,confID) VALUES ({$_SESSION["ID"]},{$_GET["ID"]})";
$attend = attendance::execut_by_sql($query);

redirect_to("conference.php?ID={$_GET["ID"]}");