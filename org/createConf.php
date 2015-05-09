<?php
require_once("../includes/conference.php");
require_once("../includes/session.php");
require_once("../includes/functions.php");
require_once("../includes/topic.php");
require_once("../includes/conftopic.php");


if(!isset($_SESSION["orgEmail"])){
    redirect_to("login.php");
}

if(isset($_POST["submit"])){

    $name = trim($_POST["confName"]);
    $intro = trim($_POST["Confintro"]);
    $loc = trim($_POST["location"]);

    $newConf = new conference();

    $mysql_datetime = strftime("%Y-%m-%d", time());


    $newConf->confName = $name;
    $newConf->introduction = $intro;
    $newConf->orgID = $_SESSION["ID"];
    $newConf->Location = $loc;

    $check = 1;

    if($_POST["fromdate"] > $mysql_datetime){
    $date1 = $_POST["fromdate"];
    if($_POST["todate"] > $date1){
    $date2 = $_POST["todate"];
        $newConf->confDate = "$date1 -"."$date2";
    if($_POST["subDate"] > $date2){
    $date3 = $_POST["subDate"];
        $newConf->confSubmitEnd = $date3;
    if($_POST["revDate"]) {
        $date4 = $_POST["revDate"];
        $newConf->confReviewEnd = $date4;
    }else{
    $session->setAttrb("message","Review date is incorrect");
        $check = -1;
    }
    }else{
        $session->setAttrb("message","Submit date is incorrect");
        $check = -1;
    }

    }else{
        $session->setAttrb("message","to date is incorrect");
        $check = -1;
    }
    }else{
        $session->setAttrb("message","From date is incorrect");
        $check = -1;
    }
    if($newConf->save()&&$check) {

        $countert = $_POST["counter"];
        $x = 0;
        $sum = 0;
        for ($J = 0; $J <= $countert; $J++) {
            if ($x == 4) {
                break;
            }
            if (isset($_POST["topic{$J}"])) {
                $query2 = "SELECT ID FROM topic WHERE topicName = '{$_POST["topic{$J}"]}'";
                $topicName = topic::find_by_sql($query2);
                $counter2 = 0;
                $array2 = array();
                foreach ($topicName as $topic) {
                    foreach ($topic as $key) {
                        if (isset($key)) {
                            $array2[$counter2] = $key;
                            $counter2++;
                        }
                    }
                }
                $id = $array2[0];
                $query3 = "INSERT INTO conftopics (topicID,confID) VALUES ({$id},{$newConf->ID})";
                $conft = conftopic::execut_by_sql($query3);
                if ($conft) {
                    $sum++;
                }
                $x++;
            }
        }

        if ($sum==$x) {
            redirect_to("index.php");
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

    <!--    Alerts Library-->
    <script src="js/bootbox.js"></script>

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

        <hr>

        <div class="alert alert-danger">
            <p>Your conference will have to get accepted by the Admin</p>

            <label><?php echo $session->getAttrb("message"); ?></label>
        </div>

        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-default col-lg-12">
                <div class="panel-heading">
                    <h1 class="panel-title">General Information</h1>
                </div>
                <div class="panel-body" id="info">
                    <div class="row well">
                        <label>Conference Name :</label>
                        <input type="text" name="confName" class="form-control btn-block input-lg" required>
                    </div>
                    <hr>

                    <br>
                    <div class="row well">
                        <h3>Write An Introduction about the Conference</h3>
                        <textarea rows="10" cols="50" name="Confintro" class="col-lg-12" required></textarea>
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="3" id="city">
                            <label for="city">Conference Location <span id="req">*</span></label>
                            <input type="text" class="form-control"  id="city" required name="location">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="3" id="fromdate">
                            <label for="fromdate">Conference Date from<span id="req">*</span></label>
                            <input type="date" class="form-control"  id="fromdate" required name="fromdate">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="3" id="todate">
                            <label for="todate">Conference Date to<span id="req">*</span></label>
                            <input type="date" class="form-control"  id="todate" required name="todate">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="3" id="subdate">
                            <label for="city">Conference Submmittion End <span id="req">*</span></label>
                            <input type="date" class="form-control"  id="subDate" required name="subDate">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="3" id="revDate">
                            <label for="revdate">Conference Reviewing End <span id="req">*</span></label>
                            <input type="date" class="form-control"  id="revDate" required name="revDate">
                        </div>
                    </div>

                    <div class="row">
                        <h3>Choose The Conference Topics</h3>

                    </div>
                    <div class="row well">

                        <?php
                        $query = "SELECT topicName FROM topic ";

                        $topics = topic::find_by_sql($query);

                        $counter = 0;
                        $array = array();
                        foreach($topics as $topic){
                            foreach($topic as $key) {
                                if (isset($key)) {
                                    $array[$counter] = $key;
                                    $counter++;
                                }
                            }
                        }
                        for($i = 0;$i<=$counter-1;$i++) {
                            ?>
                            <label><?php echo htmlentities($array[$i])?><input type="checkbox" value="<?php echo htmlentities($array[$i])?>" name="topic<?php echo $i?>" ></label>
                            <br>
                        <?php
                        }
                        ?>
                    </div>

                    <input type="hidden" value="<?php echo $i?>" name="counter">

                    <div class="row">
                        <h3> Upload Conference Picture</h3>
                    </div>

                        <input name="fileToUpload" type="file" class="input-lg btn btn-success" accept=".pdf" >
                    </div>


                </div>
                <div class="row text-center">

                    <button type="submit" class="btn btn-success btn-lg" name="submit">Submit</button>
                    <button type="reset" class="btn btn-danger btn-lg">Reset</button>

                </div>

            </div>


    </div>
    </form>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



</body>

</html>
