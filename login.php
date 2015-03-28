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


    <title>Login</title>


    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <style>

        #login-form {
            border-left: 4px solid;
        }

        .jumbotron {
            background-image: url("img/bg.jpg");

        }

        p
        {
            color: #f5f5f5;
        }

        #leftSide h1
        {
            color: black;
        }

    </style>


</head>

<body>

<div class="jumbotron">
    <div class="container">

        <div class="col-md-7 text-center" id="leftSide">
            </br>
            </br>
        <h1>Hello, world!</h1>
        <p>ReviConf is your gateway to a modern, sophisticated research environment</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up Today</a></p>
            </div>

        <div class="col-md-5" id="login-form">
            <form class="form-signin">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h1>Login</h1>
                    </div>
                    <div class="panel-body">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>




</body>
</html>
