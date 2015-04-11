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

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/findconf.js"></script>
    <script src="js/EmbeddedHelp/jquery.joyride-2.1.js"></script>



    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/EmbeddedHelp/joyride-2.1.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->







</head>

<body>



<hr>

<div id="bodyContainer" class="container" >

<h1 id="help1">Search For a Specific Conference</h1> <button id="help" class="btn-lg btn-warning">HELP ME</button>

    <div class="row" name="FindConf" >



        <div class="col-lg-12">

            <form  role="form" method="post" action="foundconf.php">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="input-group" onclick="checkac();">
                        <span class="input-group-addon" id="basic-addon1">Conference Name</span>
                        <input type="text" id ="namefield" class="form-control input-lg"  placeholder="Enter the name of the conference" aria-describedby="basic-addon1">
                    </div>
                    <h2 class="text-center text-capitalize">OR</h2>
                    <div class="input-group" onclick="checkname();">
                        <span class="input-group-addon" id="basic-addon1">Acronym</span>
                        <input type="text" id="acname" class="form-control input-lg"  placeholder="Enter the Acronym of the conference" aria-describedby="basic-addon1">
                    </div>
                </div>

            </div>

                <!--                    Buttons Row Start-->
                <div class="row">

                    <div class="text-center" name="Buttons">
                        <input type="submit" class="btn btn-primary " value="Submit">
                        <input type="reset" class="btn btn-danger " onclick="reset(); " value="Reset">

                    </div>


                </div>
                <!--            Buttons Row End-->

            </form>

    </div>






    </div>




<h1>Find a Conference</h1>
    <br>
    <br>

    <div class="row">
        <form  role="form" method="post" action="foundconf.php">


            <!--            ---------------Topics Div Start------------------>

            <div class="col-md-10" name="TopicsDiv">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">
                        Topics
                    </h2>
                </div>
                <div class="panel-body">
<!--            =================== Computer Science Topics start =====================-->
                    <div class="col-md-4" name="Computer Science Topics">


                        <div class="panel panel-default" name="CS panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Computer Science
                                </h3>
                            </div>
                            <div class="panel-body">
                                <label><input type="checkbox" value="">Object Oriented Programmin</label>
                                <br>
                                <label><input type="checkbox" value="">Compilers</label>
                                <br>
                                <label><input type="checkbox" value="">UX/UI</label>
                                <br>
                                <label><input type="checkbox" value="">Big Data</label>
                                <br>
                                <label><input type="checkbox" value="">Cloud Comoputing</label>

                            </div>
                        </div>
                    </div>

                    <!--            =================== Computer Science Topics end =====================-->


<!--                        ==== software enigineering topics start ====-->
                    <div class="col-md-4" name="SoftwareEngineeringTopics">


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Software Engineering
                                </h3>
                            </div>
                            <div class="panel-body">
                                <label><input type="checkbox" value="">Quality Assurance</label>
                                <br>
                                <label><input type="checkbox" value="">Risk Management</label>
                                <br>
                                <label><input type="checkbox" value="">Project Management</label>
                                <br>
                                <label><input type="checkbox" value="">Software Re-Engineering</label>
                                <br>
                                <label><input type="checkbox" value="">Software Design and Arch.</label>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4" name="SoftwareEngineeringTopics">


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Software Engineering
                                </h3>
                            </div>
                            <div class="panel-body">
                                <label><input type="checkbox" value="">Quality Assurance</label>
                                <br>
                                <label><input type="checkbox" value="">Risk Management</label>
                                <br>
                                <label><input type="checkbox" value="">Project Management</label>
                                <br>
                                <label><input type="checkbox" value="">Software Re-Engineering</label>
                                <br>
                                <label><input type="checkbox" value="">Software Design and Arch.</label>

                            </div>
                        </div>
                    </div>



                </div>
                <!--                        ==== Information Security topics end ====-->










            </div>
            </div>
<!--            ---------------Topics Div end------------------>


            <!--            ---------------City Div Start------------------>
        <div class="col-md-2" name="CityDiv">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        City
                    </h3>
                </div>
                <div class="panel-body">
                    <label><input type="checkbox" value="">Amman</label>
                    <br>
                    <label><input type="checkbox" value="">Irbid</label>
                    <br>
                    <label><input type="checkbox" value="">Al-Karak</label>
                    <br>
                    <label><input type="checkbox" value="">Aqaba</label>
                    <br>
                    <label><input type="checkbox" value="">Ramtha</label>
                    <br>
                    <label><input type="checkbox" value="">Tafeleh</label>
                    <br>
                    <label><input type="checkbox" value="">Zarqa'</label>
ww                    <br>
                    <label><input type="checkbox" value="">Madaba</label>
                </div>
            </div>




        </div>
            <!--            ---------------City Div end------------------>

        </div>
<!--                    Buttons Row Start-->
        <div class="row">

            <div class="text-center" name="Buttons">
                <input type="submit" class="btn btn-primary " value="Submit">
                <input type="reset" class="btn btn-danger " value="Reset">

            </div>


        </div>
<!--            Buttons Row End-->


        </form>















</div>

<!-- /Body End -->





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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>





<!-- Tip Content -->
<ol id="joyRideTipContent">
    <li data-id="help1" data-text="Next" class="custom">
        <h2>Stop #1</h2>
        <p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>
    </li>

</ol>




<script>
    $("#help").click(function() {
        $("#help1").joyride({
            'tipLocation': 'bottom',         // 'top' or 'bottom' in relation to parent
            'nubPosition': 'auto',           // override on a per tooltip bases
            'scrollSpeed': 300,              // Page scrolling speed in ms
            'timer': 2000,                   // 0 = off, all other numbers = time(ms)
            'startTimerOnClick': true,       // true/false to start timer on first click
            'nextButton': true,              // true/false for next button visibility
            'tipAnimation': 'pop',           // 'pop' or 'fade' in each tip
            'pauseAfter': [],                // array of indexes where to pause the tour after
            'tipAnimationFadeSpeed': 300,    // if 'fade'- speed in ms of transition
            'cookieMonster': true,           // true/false for whether cookies are used
            'cookieName': 'JoyRide',         // choose your own cookie name
            'cookieDomain': false,           // set to false or yoursite.com
//            'tipContainer': body,            // Where the tip be attached if not inline
//            'postRideCallback': $noop,       // a method to call once the tour closes
//            'postStepCallback': $noop        // A method to call after each step
        });
    });
</script>




</body>
</html>
