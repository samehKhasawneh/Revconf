<?php

include_once("includes/navbar-user.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Review + Paper Name</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>

<body>



<!-- /Body Start -->
<div class="jumbotron">
    <div class="container">

        <div class="text-center">
            </br>
            </br>
            <h1>Submit a Paper to:</h1>
            <p>PSUT ICT 2015</p>

        </div>

    </div>
</div>

<hr>

<div id="bodyContainer" class="container">


    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">General Information</h1>
        </div>
        <div class="panel-body" id="info">

            <label>Paper Name :</label>
            <input type="text" class="form-control btn-block">
            <hr>
            <h3>Authors</h3>
            <div class="well">
             <label >Author</label>
            <input type="text" class="form-control btn-block" name="author">

            <label >Author E-Mail</label>
            <input type="text" class="form-control btn-block" name="authorEmail">
<br>
                <input type="button" class="btn btn-warning" value="Add Author" id="AddAuthor">


                </div>


        </div>
    </div>


</div>

<script>

    var AuthorsNo =1;


    $(document).ready(function () {
        $("#AddAuthor").click(function () {
            if (AuthorsNo<7) {


                $("#info").append(' <div class="well"> <label >Author</label> <input type="text" class="form-control btn-block" name="author"> <label >Author E-Mail</label> <input type="text" class="form-control btn-block" name="authorEmail"> <br> <input type="button" class="btn btn-warning" value="Add Author" id="AddAuthor"> </div>');

                AuthorsNo++;
            }

        });


    });


</script>


</body>
</html>


