<head>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-theme.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>


</head>
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


            <ul class="nav navbar-nav">
                <li><a href="index.php">Home </a></li>
                <li><a href="#">Conferences</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>


            <form class="navbar-form navbar-right">
                <div id="log" class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div id="log" class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button id="sign" type="submit" class="btn btn-primary">Sign in</button>
                <a id="register"   href="register.php" class="btn btn-success">Register</a>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>