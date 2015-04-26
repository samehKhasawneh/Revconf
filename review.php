<?php
include_once("includes/navbar.php");
require_once("includes/user.php");
require_once("includes/session.php");
require_once("includes/paper.php");
require_once("includes/paperassign.php");
require_once("includes/functions.php");
require_once("includes/conference.php");




if(!isset($_SESSION["ID"]) || !isset($_GET["ID"])){
    redirect_to("conference.php");
}
$query = "SELECT userID FROM paperassign WHERE confID = {$_GET["ID"]} AND userID = {$_SESSION["ID"]}";
$user = paperassign::find_by_sql($query);
if(!$user) {

    redirect_to("conference.php?ID={$_GET["ID"]}");
}

$query = "SELECT paper.ID,paper.paperName FROM paper INNER JOIN paperassign ON paper.ID = paperassign.paperID INNER JOIN user ON
          user.ID = paperassign.userID AND paperassign.confID = {$_GET["ID"]};";

$papers = paper::find_by_sql($query);

$c1 = 0;
$array4 = array();
foreach($papers as $result2){
    foreach($result2 as $key4) {
        if (isset($key4)) {
            $array4[$c1] = $key4;
            $c1++;
        }
    }
}

$conf = conference::find_by_id($_GET["ID"]);


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
            <p><?php echo htmlentities($conf->confName)?></p>

        </div>

    </div>
</div>

<hr>

<div id="bodyContainer" class="container">

<!--    <p>--><?php //echo htmlentities($_SESSION["message"]) ?><!--</p>-->
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
    <?php
    for($i = 0 ; $i<=$c1-1 ; $i+=2) {
        ?>
        <tr>
            <td><?php echo htmlentities($array4[$i]) ?></td>
            <td style="color:red; font-weight: bold;"><?php echo htmlentities($array4[$i + 1]) ?></td>
            <td><?php echo htmlentities($conf->confName)?></td>
            <td>
                <a href="paperReview.php?ID=<?php echo $array4[$i] ?>">
                <button class="btn btn-block btn-success">Review
                </button>
                    </a>
            </td>

        </tr>
    <?php
    }
    ?>

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


