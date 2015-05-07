<?php
require_once("../includes/session.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/committe.php");



if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"]) || !isset($_GET["confID"]) || !isset($_GET["OP"])){
    redirect_to("index.php");
}
if($_GET["OP"] == 1) {
    $query = "INSERT INTO committe (userID,confID) ";
    $query .= "VALUES ({$_GET["ID"]},{$_GET["confID"]})";

    $result = committe::execut_by_sql($query);

        if($result){
            redirect_to("committe.php?ID={$_GET["confID"]}");
        }

}
if($_GET["OP"] == 0){

    $query = "DELETE FROM committe";
    $query .= " WHERE userID = {$_GET["ID"]} AND confID = {$_GET["confID"]}";
    $query .= " LIMIT 1";

    $result = committe::execut_by_sql($query);

    if($result){
        redirect_to("committe.php?ID={$_GET["confID"]}");
    }

}
