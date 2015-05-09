<?php
require_once("../includes/session.php");
require_once("../includes/conference.php");
require_once("../includes/database.php");
require_once("../includes/functions.php");

if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}

$query = "SELECT ID,confName,confDate,isApproved FROM conference WHERE orgID = {$_SESSION["ID"]} AND isApproved = 0";
$conf = conference::find_by_sql($query);
$counter = 0;
$array = array();
foreach($conf as $con){
    foreach($con as $key) {
        if (isset($key)) {
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

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo htmlentities($_SESSION["orgName"])?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                                <a href="confList.php">List of Conferences</a>
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
                <h3>List Of Conferences</h3>
                    <hr>
                    <div class="col-md-12 text-center ">
                    <table class="table table-bordered well">

                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Conference Name</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Approved</th>
                            <th ></th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if($array) {
                            for ($i = 0; $i <= $counter - 1; $i += 4) {
                                ?>
                                <tr>
                                    <td><?php echo htmlentities($array[$i])?></td>
                                    <td><?php echo htmlentities($array[$i+1])?></td>
                                    <td><?php echo htmlentities($array[$i+2])?></td>
                                    <td <?php if($array[$i+3] == 1){?>style="color:green;<?php }else{?>style="color:red;<?php }?>">
                                    <?php if($array[$i+3] == 1){echo "YES";}else{echo "NO";}  ?>
                                    </td>
                                    <td><a class="btn btn-success btn-block" href="delete.php?ID=<?php echo htmlentities($array[$i])?>">Delete</a></td>
                                </tr>
                            <?php
                            }
                        }
                        ?>


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
