<?php
require_once("../includes/functions.php");
require_once("../includes/user.php");
require_once("../includes/committe.php");
require_once("../includes/session.php");
require_once("../includes/topic.php");

if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}
if(!isset($_GET["ID"])){
    redirect_to("index.php");
}



$query = "SELECT user.ID FROM user INNER JOIN attendance ON user.ID = attendance.userID WHERE attendance.confID = {$_GET["ID"]}";
$users = user::find_by_sql($query);

if(!$users){
    redirect_to("confStat.php?ID={$_GET["ID"]}");
}

$counter = 0;
$array = array();
foreach($users as $user){
    foreach($user as $key){
        if(isset($key)){
            $array[$counter] = $key;
            $counter++;
        }
    }
}








?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


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
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
            </li>
            <li>
                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
            </li>
            <li>
                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                    <li>
                        <a href="#">Dropdown Item</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="blank-page.php"><i class="fa fa-fw fa-file"></i> Blank Page</a>
            </li>
            <li>
                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
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
                    Blank Page
                    <small>Subheading</small>
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


        <div class="row text-center">
            <h3>Select A Committee </h3>
            <hr>
            <div class="col-md-12 text-center ">
                <table class="table table-bordered well">

                    <thead>
                    <tr>

                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Preferred Topics </th>
                        <th class="text-center">City</th>
                        <th ></th>


                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    for($i=0;$i<=$counter-1;$i++) {
                        $found_user = user::find_by_id($array[$i]);

                        $query2 = "SELECT userID FROM committe WHERE userID = {$found_user->ID}";
                        $com = committe::find_by_sql($query2);

                        if (!$com) {
                            ?>
                            <tr>
                                <?php
                                $query3 = "SELECT topic.topicName FROM topic INNER JOIN usertopic ON topic.ID = usertopic.topicID WHERE usertopic.userID = {$found_user->ID}";
                                $topics = topic::find_by_sql($query3);
                                $counter1 = 0;
                                $array2 = array();
                                foreach($topics as $topic){
                                    foreach($topic as $key){
                                        if(isset($key)){
                                            $array2[$counter1] = $key;
                                            $counter1++;
                                        }
                                    }
                                }
                                ?>
                                <td><?php echo htmlentities($found_user->ID)?></td>
                                <td><?php echo htmlentities($found_user->FirstName); echo " ";echo htmlentities($found_user->LastName);?></td>
                                <td><?php for($i=0;$i<=$counter1-1;$i++) { echo htmlentities($array2[$i]); echo "<br>"; } ?></td>
                                <td><?php echo htmlentities($found_user->city)?></td>
                                <td><a class="btn btn-success btn-block" href="addremovecom.php?ID<?php echo htmlentities($found_user->ID)?>&confID=<?php echo htmlentities($_GET["ID"])?>&o=1">Add</a></td>
                            </tr>
                        <?php
                        } else {
                            ?>
                            <tr>
                                <?php
                                $query3 = "SELECT topic.topicName FROM topic INNER JOIN usertopic ON topic.ID = usertopic.topicID WHERE usertopic.userID = {$found_user->ID}";
                                $topics = topic::find_by_sql($query3);
                                $counter1 = 0;
                                $array2 = array();
                                foreach($topics as $topic){
                                    foreach($topic as $key){
                                        if(isset($key)){
                                            $array2[$counter1] = $key;
                                            $counter1++;
                                        }
                                    }
                                }
                                ?>
                                <td><?php echo htmlentities($found_user->ID)?></td>
                                <td><?php echo htmlentities($found_user->FirstName); echo " ";echo htmlentities($found_user->LastName);?></td>
                                <td><?php for($i=0;$i<=$counter1-1;$i++) { echo htmlentities($array2[$i]); echo "<br>"; } ?></td>
                                <td><?php echo htmlentities($found_user->city)?></td>
                                <td><a class="btn btn-danger btn-block" href="addremovecom.php?ID<?php echo htmlentities($found_user->ID)?>&confID=<?php echo htmlentities($_GET["ID"])?>&o=1">Remove</a></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>




                    </tbody>


                </table>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



</body>

</html>
