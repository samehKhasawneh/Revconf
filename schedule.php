<!DOCTYPE html>
<html>
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

    <script src="js/schedule.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">

    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->

</head>

<body>
<form method="post" action="includes/scheduleCheck.php">

<div class="container" id="container">

<div class="well">

<legend>Session 1</legend>

        <div class="row">

        <div class="col-md-2" id="startingTime">
        <label for="sTime">Starting Time</label>
        <input type="time" class="form-control" id="sTime" name="sTime1" >


        </div>


            <div class="col-md-2" id="endingTime">
                <label for="eTime">Ending Time</label>
                <input type="time" class="form-control" id="eTime" name="eTime1">

            </div>

            <div class="col-md-2" id="chairDiv">
                <label for="chair">Chair</label>
                <input type="text" class="form-control" id="chair" name="chair1">

            </div>

</div>
    <hr>

        <div class="row">
<div class="col-md-1"></div>
<div class="well col-md-4 ">    <!--            papers Div-->

    <fieldset>
        <legend>Papers</legend>

        Paper 1 <input type="checkbox" class="" value="paper1" id="paper1" name="paper1">
        <br>
        Paper 2 <input type="checkbox" class="" value="paper2" id="paper2" name="paper2">
        <br>


    </fieldset>

</div>


<div class="col-md-1"></div>


            <div class="well col-md-4 ">    <!--            Lunch Div-->

                <fieldset>
                    <legend>Special Sessions</legend>

                    Welcome <input type="radio" class="" id="welcome" value="welcome" name="specialSes">
                    <br>
                    Breakfast <input type="radio" class="" id="breakfast" value="breakfast" name="specialSes">
                    <br>

                    Lunch <input type="radio" class="" id="lunch" value="lunch" name="specialSes">
                    <br>

                    Dinner <input type="radio" class="" id="dinner" value="dinner" name="specialSes">
                    <br>




                </fieldset>

            </div>


</div>





    </div>

    <input class="btn btn-primary" type="submit" >
    <input class="btn btn-warning" type="button" id="AddSession" value="Add Another Session" style="float: right" >
    <input type="hidden" value="" name="NumberOfSessions" id="NOS" >
</form>

</body>


</html>