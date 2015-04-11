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

    <title>RevCon | Organization Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/noty/buttons.css"/>
    <link rel="stylesheet" type="text/css" href="css/noty/animate.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/findconf.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/checkform.js"></script>
    <script src="js/noty/topRight.js"></script>
    <script src="js/noty/jquery.noty.packaged.min.js"></script>
    <script src="js/noty/notification_html.js"></script>


    <style>
        span#req {
            color: red;
            font-size: large;
        }

        /*.img-thumbnail {*/

            /*height: 100%;*/
        /*}*/

    </style>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>     <!--Head End-->
<hr>
<body> <!-- /Body Start -->

<div class="container">
    <div class="row">
        <h1>Register to RevCon</h1>
    </div>

    <div class="alert alert-info">Register to gain full access to RevCon</div>
    <div class="alert alert-danger">Note that the most common reason for failing to create an account is an incorrect email address so please type your email address correctly.</div>


    <div class="row"> <!-- Registration Info -->
        <h6>Please fill out the following form. The required fields are marked by (*)</h6>
    </div>

    <div id = "alert_placeholder" class="alert alert-danger"><h2 id="alertHeader"></h2></div>


    <div class="container  " id="formContainer"  >
        <form role="form" class="col-md-4">
            <!------------Org Name --------->
            <div class="row form-group " >
                <div class="" ID="orgName">
                    <label for="orgName">Organization Name: <span id="req">*</span></label>
                    <input type="text" class="form-control" id="orgName" required>
                </div>
            </div>
            <!------------Org Name --------->



            <!------------Email --------->
            <div class="row form-group">
                <div class="">
                    <label for="mail">Email <span id="req">*</span></label>
                    <input type="email" class="form-control" id="mail" required>
                </div>
            </div>
            <!------------Email --------->

            <!------------Email CHeCK --------->
            <div class="row form-group">
                <div class="">
                    <label for="mail2">Enter Email Again <span id="req">*</span></label>
                    <input type="email" class="form-control" id="mail2"  required>
                </div>
            </div>
            <!------------Email check --------->

            <!------------Password 1 --------->
            <div class="row form-group">
                <div class="">
                    <label for="pwd1">Password  <span id="req">*</span></label>
                    <input type="password" class="form-control" id="pwd1" required>
                </div>

            </div>

            <!------------Password  1--------->

            <!------------Password Check --------->
            <div class="row form-group">
                <div class="">
                    <label for="pwd2">Enter Password again  <span id="req">*</span></label>
                    <input type="password" class="form-control" id="pwd2" required>
                </div>
            </div>

            <!------------Password  Check--------->

            <!------------Website --------->
            <div class="row form-group">
                <div class="">
                    <label for="web">Website</label>
                    <input type="text" class="form-control" id="web">
                </div>
            </div>

            <!------------Website--------->



            <!------------Age --------->
            <div class="row form-group">
                <div class="">
                    <label for="adrs">Address <span id="req">*</span></label>
                    <input type="text" class="form-control " id="adrs" required>

                </div>
            </div>
            <!------------Age --------->


            <div class="text-center">
                <hr>
                <button type="submit" id="submit" class="btn-lg btn-success">Submit</button>
                <button type="reset" id="reset" class="btn-lg btn-danger">Reset</button>

            </div>

        </form>

        <div class="col-md-2" >


        </div>

        <div class="col-md-5 text-center" id="pictureMiddlePage">
            <hr>
            <hr>
            <h3 class="text-center">Organization Registration</h3>
            <img class="img-thumbnail" width="100%" height="100%" src="img/org.jpg" >


        </div>

    </div> <!-- Form Container -->

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
                            <li><a href="/">© 2013 Company Name.</a></li>
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

