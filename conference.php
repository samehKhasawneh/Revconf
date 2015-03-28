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
            <h1>Conference Name</h1>
            <p>20/5/2015</p>

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

             <img src="https://services.rss.jo/Images/logo4_2.png" class="img-thumbnail" alt="Cinque Terre">


                <div class="table-responsive" >
                    <table class="table">

                        <tbody >
                        <tr>
                            <td><strong>Conference Name</strong></td>
                            <td>PSUT ICT MINA 2015</td>
                        </tr>
                        <tr>
                            <td><strong>Organization</strong></td>
                            <td>PSUT</td>
                        </tr>

                        <tr>
                            <td><strong>Conference Date</strong></td>
                            <td>12/5/2015</td>
                        </tr>

                        <tr>
                            <td><strong>Submitting Start Date</strong></td>
                            <td>12/5/2015</td>
                        </tr>

                        <tr>
                            <td><strong>Submitting End Date</strong></td>
                            <td>12/5/2015</td>
                        </tr>

                        <tr>
                            <td><strong>Reviewing Start Date</strong></td>
                            <td>12/5/2015</td>
                        </tr>

                        <tr>
                            <td><strong>Reviewing End Date</strong></td>
                            <td>12/5/2015</td>
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
                The 7th International Conference on Information Technology, ICIT 2015 is a forum for scientists, engineers, and practitioners to present their latest research results, ideas, developments, and applications in all areas of Information Technology. ICIT 2015 will include presentations of contributed papers and state-of-the-art lectures by invited keynote speakers. Moreover, the program will include tutorials on hot areas of Information Technology.

                All submitted papers will go through double-blind* reviewing processes by at least three reviewers. Extended versions of the conference best selected papers will be evaluated to be published in WCSIT special issue (www.wcsit.org) and in ARPN Journal of Systems and Software (http://www.scientific-journals.org).
            </div>
                </div>

<!--            intro div end-->

<hr>
            <!--            topics div start-->
            <div id="topicsDiv">
                <h2>Topics</h2>

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
            <!--            Committee div start-->
            <div id="committeeDiv">
                <h2>Committee</h2>

                <div class="well">

<div class="row">

    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/65.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>

    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/31.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>

    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/62.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>

    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/45.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/12.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/77.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/54.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/12.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/2.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/32.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/22.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>
    <div ng-repeat="u in users" class="col-xs-4 col-sm-2 ng-scope">
        <img src="http://api.randomuser.me/portraits/men/66.jpg" class="img-thumbnail img-responsive img-circle">
        <h3 class="text-center ">art</h3>
        <hr>
    </div>

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


