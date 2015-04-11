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
<!------------------- Navbar Start ---------------------------->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div id="log" class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div id="log" class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button id="sign" type="submit" class="btn btn-primary">Sign in</button>
                <button id="register"  class="btn btn-success">Register</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<!------------------- Navbar End ---------------------------->


<!-- Carousel
    ================================================== -->
<div class="jumbotron">
    <div class="container">

        <div class="text-center" id="jump">
            </br>
            </br>
            <h1 class="animated fadeInLeftBig  ">Hello, Khaled</h1>
            <img  id="profilephoto" src="img/user.jpg" class="img-thumbnail img-circle animated zoomInUp   " width="25%">
            <p></p>

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
                    <button id="but" class="btn btn-block btn-primary" href="#" role="button">View</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
