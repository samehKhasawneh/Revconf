<?php
require_once("./includes/functions.php");
require_once("./includes/database.php");
require_once("./includes/session.php");
require_once("./includes/DatabaseObject.php");
require_once("./includes/userimgs.php");
require_once("./includes/attendance.php");
require_once("./includes/paper.php");
require_once("./includes/reviewresults.php");
include_once("includes/navbar-user.php");






if (!isset($_SESSION["Email"])) {
    redirect_to("login.php");

}

?>
<?php


$query = "SELECT imageURL FROM userimgs WHERE userID = {$_SESSION['ID']}";
$sql = userimgs::find_by_sql($query);
$counter = 0 ;
$array = array();
foreach($sql as $s){
    foreach($s as $key){
        $array[$counter] = $key;
        $counter++;
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

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


<style>

   #jump h1
   {
       color: floralwhite;
   }
</style>




</head>

<body>



<!-- Carousel
    ================================================== -->
<div class="jumbotron">
    <div class="container">
        <div class="col-md-12">
        <div class="col-md-8 text-center" id="jump">
            <br>
            <br>
            <h1 class="animated fadeInLeftBig  ">Hello, <?php echo ucfirst($_SESSION['FirstName'])?></h1>
            <img  id="profilephoto" src="<?php echo htmlentities($array[1]); ?>" class="img-thumbnail img-circle animated zoomInUp   " width="50%">
            <p></p>

        </div>
        <br>
        <br>
            <br>
            <br>
            <br>
        <div class="animated bounceInUp well col-md-4 text-center">

            <?php
            $query = "SELECT * FROM attendance WHERE userID = {$_SESSION["ID"]}";
            $sql = attendance::find_by_sql($query) ;
            $counter = 0 ;
            foreach($sql as $s){
            $counter++;
            }
            ?>
            <h3><span style="color: red; font-weight: bold"><?php echo $counter?></span>  Attended Conferences</h3>


        </div>

        <div class="animated bounceInUp  well col-md-4 text-center">

            <?php
            $query2 = "SELECT * FROM reviewresults WHERE userID = {$_SESSION["ID"]}";
            $sql2 = reviewresults::find_by_sql($query2) ;
            $counter2 = 0 ;
            foreach($sql2 as $s2){
                $counter2++;
            }
            ?>
            <h3><span style="color: red; font-weight: bold"><?php echo $counter2?></span>   Reviewed Papers</h3>
        </div>

        <div class="animated bounceInUp  well col-md-4 text-center">

            <?php
            $query1 = "SELECT * FROM paper WHERE userID = {$_SESSION["ID"]}";
            $sql1 = paper::find_by_sql($query1) ;
            $counter1 = 0 ;
            foreach($sql1 as $s1){
                $counter1++;
            }
            ?>
            <h3><span style="color: red; font-weight: bold"><?php echo $counter1?></span>  Submitted Papers</h3>
        </div>
        </div>
        </div>

    </div>

<hr>

<!-- /.carousel -->

<hr>

<div id="bodyContainer" class="container">
    <!-- Example row of columns -->
    <div class="row text-center">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h2 class="text-center">My Conferences</h2>
                    <p class="text-center">View a list of conferences which I'm attending</p>
                    <button id="but" class="btn btn-block btn-primary" href="myconf.php" role="button">View</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center">Search for a Conference</h2>
                    <p class="text-center">View a lists of conferences which you can attend</p>
                    <a type="button" id="but" class="btn btn-block btn-primary" href="findconf.php">Find </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center">My Profile</h2>
                    <p class="text-center">Visit and Edit Your Profile</p>
                    <a type="button" id="but" class="btn btn-block btn-primary" href="profile.php">Go to Profile </a>
                </div>
            </div>

        </div>
    </div>

    <hr>


</div> <!-- /container -->

<div class="container" id="FooterContainer">

    <footer>
        <div class="row">
            <div class="container text-center">
                <hr />
                <div class="row">

                    <div class="col-md-5" id="leftFooter" style=" border-right:1px solid black"">

                    <img src="img/logo.png" class="img-thumbnail" width="50%" height="50%" style="float: left;">
                    <br>
                    <br>
                    <h2 id="footerHead">ReviConf</h2>

                </div>


                <div class="col-lg-7">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Product for Mac</a></li>
                            <li><a href="#">Product for Windows</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Web analytics</a></li>
                            <li><a href="#">Presentations</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Product Help</a></li>
                            <li><a href="#">Developer API</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="/"> Copyright <?php echo htmlentities("© ");  echo date("Y",time()); ?>  Company Name.</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>

</div>
</footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
