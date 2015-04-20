<?php
//if (!$session->is_logged_in()) { redirect_to("login.php"); }
include_once("includes/navbar.php");
require_once("includes/DatabaseObject.php");
require_once("includes/database.php");
require_once("includes/session.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>


    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>



    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->
    <script>

        $(document).ready(function(){
            $newTitle = $("#userName").text();
            $("title").text($newTitle);

        });

    </script>

</head>

<body>



<!-- /Body Start -->

<hr>

<div id="bodyContainer" class="container">




<!----------------------------------->
<div class="row">
<hr>
<div class="col-md-4 text-center" id="logoo" >


    <img id="profilephoto" src="http://api.randomuser.me/portraits/men/2.jpg" class="img-thumbnail img-circle " width="75%">

    <h1 class="text-center" id="userName">Khaled Tamimi</h1>

<hr>
    <div class="table-responsive" >
        <table class="table">

            <tbody >
            <tr>
                <td><strong>City</strong></td>
                <td>Amman</td>
            </tr>
            <tr>
                <td><strong>Organization</strong></td>
                <td>PSUT</td>
            </tr>

            <tr>
                <td><strong>Join Date</strong></td>
                <td>12/5/2015</td>
            </tr>

            <tr>
                <td><strong>Number Of Attended Conferences</strong</td>
                <td>5</td>
            </tr>


            </tbody>
        </table>
    </div>


<div class="well text-center" >

    <a href="#"><img src="img/fb.png" class="img-thumbnail " width="25%"></a>
    <a href="#"> <img src="img/linkedin-icon.png" class="img-thumbnail " width="25%"></a>
        <a href="#"><img src="img/email.png" class="img-thumbnail " width="35%"></a>

</div>



</div>
<!--profile container div start-->
<div class="col-md-8" id="profileContainer">

    <!--            intro div start-->
    <div id="introDiv">
        <h2>About Me</h2>

        <div class="well">
            <?php $userID = $_SESSION['userID'];?>
            <?php  $query = "SELECT aboutme FROM userinfo WHERE userID = 1";
                  $sql = DatabaseObject::find_by_sql($query) ;
            ?>
           <?php echo htmlentities($sql->aboutme); ?>
        </div>
    </div>

    <!--            intro div end-->


    <hr>
    <!--            topics div start-->
    <div id="topicsDiv">
        <h2>Prefered Topics</h2>

        <div class="well">

            <p class="label label-primary">Software Engineering</p>
            <p class="label label-primary">Artificial Intelligence</p>
            <p class="label label-primary">UX/UI</p>
            <p class="label label-primary">Software Engineering</p>
            <p class="label label-primary">Artificial Intelligence</p>
            <p class="label label-primary">UX/UI</p>

        </div>
    </div>

    <!--            topics div end-->

    <hr>
    <!--            Attended Conferences div start-->
    <div id="committeeDiv">
        <h2>Attended Conferences</h2>

        <div class="well">

            <div class="row">

<table class="table table-responsive">

    <thead>
    <tr>
        <th>Conference Name</th>
        <th>Conference Location</th>
        <th>Date</th>
        <th></th>
    </tr>
    </thead>

    <tbody>

    <tr>
        <td>ICIT 2015</td>
        <td>Amman</td>
        <td>20/5/2014</td>
        <td><a class="btn btn-success">Open</a> </td>
    </tr>

    <tr>
        <td>ICIT 2015</td>
        <td>Amman</td>
        <td>20/5/2014</td>
        <td><a class="btn btn-success">Open</a> </td>
    </tr>

    <tr>
        <td>ICIT 2015</td>
        <td>Amman</td>
        <td>20/5/2014</td>
        <td><a class="btn btn-success">Open</a> </td>
    </tr>

    <tr>
        <td>ICIT 2015</td>
        <td>Amman</td>
        <td>20/5/2014</td>
        <td><a class="btn btn-success">Open</a> </td>
    </tr>

    <tr>
        <td>ICIT 2015</td>
        <td>Amman</td>
        <td>20/5/2014</td>
        <td><a class="btn btn-success">Open</a> </td>
    </tr>

    </tbody>



</table>

            </div>

        </div>
    </div>

    <!--            Attended COnferences div end-->







</div>
<!--        conf container div end-->







</div>


</div>
<!----------------------------------->
<hr>
<hr>
<!----------------------------------->


<!----------------------------------->



</body>
</html>


