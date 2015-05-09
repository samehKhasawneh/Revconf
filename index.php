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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->





</head>

<body>


<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://eeecos.org/Final/conference-hall.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Welcome to RevCon</h1>
                    <p>Upload it, Review it, Attend it</p>
                    <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="http://news.bahai.org/images/news/regional-conferences/photo-header-frankfurt.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>PSUT ICIT 2015</h1>
                    <p>Date: 26/5/2015</p>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!-- /.carousel -->

<hr>

<div id="bodyContainer" class="container">



    <div class="row text-center well">
        <div class=" col-md-12">


            <img class="img img-responsive img-thumbnail " src="img/logo.png" width="10%" height="10%">
            </br>

            <h2>ReviConf Will Allow You To: </h2>
            <br>
            <hr>

            <div class="col-md-4">
                <img src="img/submit-paper-sign.png" class="img img-responsive img-thumbnail "/>
            </div>


            <div class="col-md-4">
                <img src="img/review.jpg" class="img img-responsive img-thumbnail" id="rev"/>
            </div>


            <div class="col-md-4">
                <img src="img/meeting.jpg" class="img img-responsive img-thumbnail" id="conference"/>
                <script>
                    var x = $('#rev').height();
                    var y = $('#rev').width();

                    $("#conference").height(x);
                    $("#conference").width(y);


                </script>
            </div>

        </div>


    </div>












    <div class="row text-center well">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="img/conf2.jpg" width="100%" class="img-thumbnail img-rounded">
                    <h2 class="text-center">Conferences</h2>
                    <p class="text-center">View a lists of conferences which you can attend</p>
                    <br>
                    <button id="but" class="btn btn-block btn-primary" href="#" role="button">View details</button>
                </div>
            </div>
        </div>

        <div class="col-md-4" >
            <h1>Hello</h1>
        </div>

    </div>
    <div class="row text-center">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="img/search.jpg" width="100%" height="25%%" class="img-thumbnail img-rounded">
                    <h2 class="text-center">Find a Conference</h2>
                    <p class="text-center">Search for a Conference</p>
                    <a id="but" class="btn btn-block btn-primary" href="findconf.php" role="button">View details</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="img/gPlay.png" width="100%" class="img-thumbnail img-rounded">
                    <h3 class="text-center">Download Mobile Application</h3>
                    <p class="text-center">Download our Android Application to make use of all of our features</p>
                    <button id="but" class="btn btn-block btn-primary" href="#" role="button">Download</button>
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


                    <h2 id="footerHead">ReviConf</h2>
                    <p>Upload It, Review It, Attend It</p>

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
                        <li>© Copyright <?php echo date("Y",time()); ?> Company Name.</li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>

</div>


