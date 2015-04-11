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
            <h1>Review Papers</h1>
            <p>Conference Name</p>

        </div>

    </div>
</div>

<hr>

<div id="bodyContainer" class="container">


    <table class="table table-responsive table-bordered well">

    <thead>
    <tr>
        <th rowspan="1" colspan="1">Paper ID</th>
        <th rowspan="3">Paper Title</th>
        <th>Conference</th>
        <th></th>
    </tr>

    </thead>

    <tbody>

    <tr>
        <td>12</td>
        <td style="color:red; font-weight: bold;">an Implementation to a Unix Based Compiler</td>
        <td>PSUT MINA 15 </td>
        <td> <button class="btn btn-block btn-success">Review</button>  </td>

    </tr>



    <tr>
        <td>18</td>
        <td style="color:red; font-weight: bold;">an Implementation to a Windows Based Cloud System</td>
        <td>PSUT MINA 15 </td>
        <td> <a class="btn btn-block btn-success" href="paperReview.php">Review</a>  </td>

    </tr>


    <tr>
        <td>25</td>
        <td style="color:red; font-weight: bold;">Risk Management Model</td>
        <td>PSUT MINA 15 </td>
        <td> <button class="btn btn-block btn-success">Review</button>  </td>

    </tr>


    </tbody>



</table>


</div>
<!----------------------------------->
<hr>
<hr>
<!----------------------------------->


<!----------------------------------->



</body>
</html>


