<?php
include_once("includes/navbar.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RevCon | Found Conferences</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/findconf.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/checkform.js"></script>
    <style>
        span#req {
            color: red;
            font-size: large;
        }
    </style>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>     <!--Head End-->
<hr>
<body> <!-- /Body Start -->

<div class="container">
    <hr>
    <div class="row text-center">
        <h1>Register to RevCon</h1>
    </div>

   <hr>

    <div id = "alert_placeholder"></div>

    <div class="row text-center">

        <div class="col-md-2">
        </div>

        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center">Organization Registration</h3>
                    <p class="text-center">Register as an Organization to create a conference</p>
                    <img src="img/org.jpg" class="img-thumbnail" width="100%" height="100%">
                    <a id="but" class="btn btn-primary btn-block" href="orgRegister.php" role="button">Register</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center">Users Registration</h3>
                    <p class="text-center">Register as a User</p>
                    <img src="img/user.png" class="img-thumbnail" width="100%" height="100%">
                    <a id="but" class="btn btn-primary btn-block" href="userregister.php" role="button">Register</a>
                </div>
            </div>
        </div>
    </div>

    <hr>


</div>



</body>     <!--BOdy ENd-->

<div class="container" id="FooterContainer">

    <footer>
        <div class="row">
            <div class="container text-center">
                <hr />
                <div class="row">
                    <div class="col-lg-12">
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
                            <li><a href="/">Copyright <?php echo htmlentities("© ");  echo date("Y",time()); ?>  Company Name.</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>
</div>


</html>

