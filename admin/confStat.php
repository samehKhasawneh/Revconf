<?php
require_once("../includes/session.php");
require_once("../includes/conference.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");
require_once("../includes/paper.php");
require_once("../includes/attendance.php");
require_once("../includes/reviewresults.php");
require_once("../includes/organization.php");


if(!isset($_SESSION["isAdmin"])){
    redirect_to("./../login.php");
}
if(!isset($_GET["ID"])){
    redirect_to("index.php");
}


$query = "SELECT * FROM paper WHERE confID = {$_GET["ID"]}";
$pnum = paper::find_by_sql($query);
$counter = 0;
foreach($pnum as $p){
    $counter++;
}

$query = "SELECT * FROM paper WHERE confID = {$_GET["ID"]} AND isAccepted = 1";
$pnum = paper::find_by_sql($query);
$counter1 = 0;
foreach($pnum as $p){
    $counter1++;
}

$query = "SELECT * FROM reviewresults INNER JOIN paper ON reviewresults.paperID = paper.ID WHERE confID = {$_GET["ID"]}";
$pnum = reviewresults::find_by_sql($query);
$counter3 = 0;
foreach($pnum as $p){
    $counter3++;
}

$conf = conference::find_by_id($_GET["ID"]);

$query = "SELECT * FROM attendance WHERE confID = {$_GET["ID"]}";
$pnum = attendance::find_by_sql($query);
$counter2 = 0;
foreach($pnum as $p){
    $counter2++;
}

$org = organization::find_by_id($conf->orgID);




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/Chart.min.js"></script>

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SB Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li ">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Admin Panel</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo" class="" aria-expanded="true"><i class="fa fa-fw fa-arrows-v"></i> Conference <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse in" aria-expanded="true">
                        <li class="active">
                            <a href="conf.php">List of Conferences</a>
                        </li>
                        <li>
                            <a href="#"> Conferences Requests </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="users.php"><i class="fa fa-fw fa-table"></i> Users</a>

                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1" class="" aria-expanded="true"><i class="fa fa-fw fa-table-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse in" aria-expanded="true">
                        <li class="active">
                            <a href="users.php">List of Users</a>
                        </li>
                        <li>
                            <a href="#"> User Requests </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo htmlentities($org->orgName)?>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->




            <div class="row">

                <div class="col-md-6">


                    <table class="table table-bordered text-center">

                        <tbody>

                        <tr>
                            <td><strong>Conference Name</strong></td>
                            <td><?php echo htmlentities($conf->confName)?></td>


                        </tr>

                        <tr>
                            <td><strong>Conference Location</strong></td>
                            <td><?php echo htmlentities($conf->Location)?></td>
                        </tr>

                        <tr>
                            <td><strong>Conference Organization</strong></td>
                            <td><?php echo htmlentities($org->orgName)?></td>
                        </tr>

                        <tr>
                            <td><strong>No. of attendees</strong></td>
                            <td><?php echo htmlentities($counter2)?></td>
                        </tr>

                        <tr>
                            <td><strong>No. of papers submitted</strong></td>
                            <td><?php echo htmlentities($counter)?></td>
                        </tr>


                        <tr>
                            <td><strong>No. of papers Accepted</strong></td>
                            <td><?php echo htmlentities($counter1)?></td>
                        </tr>

                        <tr>
                            <td><strong>No. of reviews conducted</strong></td>
                            <td><?php echo htmlentities($counter3)?></td>
                        </tr>


                        </tbody>




                    </table>


                </div>


                <div class=" col-md-5 text-center">
                    <canvas id="canvas"></canvas>
                    <p class="well">graph(a) : Number of attendees by Date</p>

                </div>
            </div>


            <script>
                var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
                var lineChartData = {
                    labels : ["Date1","Date2","Date3","Date4","Date5","Date6","Date7"],
                    datasets : [

                        {
                            label: "My First dataset",
                            fillColor : "rgba(151,187,205,0.2)",
                            strokeColor : "rgba(151,187,205,1)",
                            pointColor : "rgba(151,187,205,1)",
                            pointStrokeColor : "#fff",
                            pointHighlightFill : "#fff",
                            pointHighlightStroke : "rgba(151,187,205,1)",
                            data : [5,10,30,40,80,120,210]
                        }
                    ]

                }

                window.onload = function(){
                    var ctx = document.getElementById("canvas").getContext("2d");
                    window.myLine = new Chart(ctx).Line(lineChartData, {
                        responsive: true
                    });
                }


            </script>













        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


</body>

</html>
