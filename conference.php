<?php
include_once("includes/navbar.php");
require_once("includes/functions.php");
require_once("includes/database.php");
require_once("includes/DatabaseObject.php");
require_once("includes/conference.php");
require_once("includes/conftopic.php");
require_once("includes/committe.php");
require_once("includes/user.php");
require_once("includes/session.php");
require_once("includes/topic.php");
require_once("includes/userimgs.php");



if(empty($_GET["ID"])) {
    $session->message("No conference has been choosen");
    redirect_to("findconf.php");
}
$conference = conference::find_by_id($_GET["ID"]);

if(!$conference) {
    $session->message("The conference is not exists.");
    redirect_to("findconf.php");
}

$query = "SELECT topic.topicName FROM topic INNER JOIN conftopics WHERE topic.ID = conftopics.topicID AND conftopics.confID = {$_GET["ID"]};";

$topics = topic::find_by_sql($query);

$counter = 0;
$array = array();
foreach($topics as $topic){
    foreach($topic as $key) {
        if (isset($key)) {
            $array[$counter] = $key;
            $counter++;
        }
    }
}

$quey2 = "SELECT user.ID, user.FirstName FROM user INNER JOIN committe WHERE user.ID = committe.userID AND committe.confID = {$_GET["ID"]}";

$users = user::find_by_sql($quey2);

$counter1 = 0;
$array1= array();
foreach($users as $user){
    foreach($user as $key) {
        if (isset($key)) {
            $array1[$counter1] = $key;
            $counter1++;
        }
    }
}





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
    <script src="js/submitPaper.js"></script>
    <script src="js/ui-bootstrap-0.12.1.min.js"></script>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>

<body>



<!-- /Body Start -->
<div class="jumbotron">
    <div class="container">

        <div class="text-center">
            </br>
            </br>
            <h1><?php echo htmlentities($conference->confName)?></h1>
            <p><?php echo htmlentities($conference->confDate)?></p>

        </div>

    </div>
</div>

<hr>

<div id="bodyContainer" class="container">



    <!----------------------------------->
    <div class="row">
            <div class="col-md-4" id="logoo">

                </br>
                </br>
                </br>

             <img src="<?php echo htmlentities($conference->photoURL)?>" class="img-thumbnail" alt="Cinque Terre">


                <div class="table-responsive" >
                    <table class="table">

                        <tbody >
                        <tr>
                            <td><strong>Conference Name</strong></td>
                            <td><?php echo htmlentities($conference->confName)?></td>
                        </tr>
                        <tr>
                            <td><strong>Organization</strong></td>
                            <td><?php echo htmlentities($conference->orgID)?></td>
                        </tr>
                        <tr>
                            <td><strong>Location</strong></td>
                            <td><?php echo htmlentities($conference->Location)?></td>
                        </tr>
                        <tr>
                            <td><strong>Conference Date</strong></td>
                            <td><?php echo htmlentities($conference->confDate)?></td>
                        </tr>

                        <tr>
                            <td><strong>Submitting End Date</strong></td>
                            <td><?php echo htmlentities($conference->confSubmitEnd)?></td>
                        </tr>

                        <tr>
                            <td><strong>Reviewing End Date</strong></td>
                            <td><?php echo htmlentities($conference->confReviewEnd)?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>



                <div class="panel panel-default text-center" id="join" >
                    <div class="panel-body">
                        <h2 class="text-center">Join This Conference</h2>
                        <p class="text-center">View a lists of conferences which you can attend</p>
                        <button  class="btn btn-primary btn-lg btn-block" role="button">Join</button>
                    </div>
                </div>

                <div class="panel panel-default text-center" id="submitpaper">
                    <div class="panel-body">
                        <h2 class="text-center">Submit Paper</h2>
                        <p class="text-center">View a lists of conferences which you can attend</p>
                        <button id="submitPaper" class="btn btn-primary btn-lg btn-block" role="button">Submit</button>
                    </div>
                </div>


                <div class="panel panel-default text-center" id="reviewPaper">
                    <div class="panel-body">
                        <h2 class="text-center">Review Paper</h2>
                        <p class="text-center">Review Papers</p>
                        <button id="submitPaper" class="btn btn-primary btn-lg btn-block" role="button">Review</button>
                    </div>
                </div>
                <script>
                    //             <!-- This will check if the user has joined the conference if he did , the join div will get removed -->
                    x = true;
                    if (x)
                    {
                        var x = document.getElementById("join");
                        //x.remove();

                    }

                </script>



            </div>
                        <!--conf container div start-->
        <div class="col-md-8" id="confContainer">

<!--            intro div start-->
            <div id="introDiv">
        <h2>Introduction</h2>

            <div class="well">
                <?php echo htmlentities($conference->introduction)?>
            </div>
                </div>

<!--            intro div end-->

<hr>
            <!--            topics div start-->
            <div id="topicsDiv">
                <h2>Topics</h2>

                <div class="well">

                    <?php
                    for($i = 0;$i<=$counter-1;$i++) {
                        ?>
                        <p class="label label-primary"><?php echo htmlentities($array[$i])?></p>

                    <?php
                    }
                    ?>

                </div>
            </div>

            <!--            topics div end-->

<hr>
            <!--            Committee div start-->
            <div id="committeeDiv">
                <h2>Committee</h2>

                <div class="well">

<div class="row">

    <?php
    for($i = 0; $i <= $counter1-1 ;$i+=2){
    ?>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <?php
        $query3 = "SELECT imageURL FROM userimgs WHERE userID = {$array1[$i]};";
        $photos = userimgs::find_by_sql($query3);
        $counter2 = 0;
        $array2 = array();
        foreach($photos as $photo){
            foreach($photo as $key) {
                if (isset($key)) {
                    $array2[$counter2] = $key;
                    $counter2++;
                }
            }
        }
        ?>
        <img src="<?php if($i == 0){echo $array2[$i];}else{echo $array2[$i-2];}?>" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center "><?php echo htmlentities($array1[$i+1]) ?></h3>
        <hr>
    </div>
    <?php
    }
    ?>


</div>

                </div>
            </div>

            <!--            Committee div end-->



            <!--            Accepted Papers div start-->
            <div id="accepted Papers">
                <h2>Accepted Papers</h2>

                <div class="well">



                </div>
            </div>

            <!--            Accepted div end-->



        </div>
<!--        conf container div end-->





        <div  id="ajaxDiv" class="col-md-8" style="display: none;" >

            <script>


                $(document).ready(function(){


                    $.ajax({url: "paperSubmit.php" ,
                        cache: false ,
//                            data: "workerID=<?//=$row['workerID'];?>//",
                        success: function(result){
                            $("#ajaxDiv").html(result);
                        },
                        error: function(result){
                            $("#ajaxDiv").html("error");
                        }



                    });
                });



            </script>

        </div>

            </div>


    </div>
    <!----------------------------------->
<hr>
    <hr>
    <!----------------------------------->


    <!----------------------------------->



</body>
</html>


