<?php
include_once("includes/navbar.php");
require_once("includes/functions.php");
require_once("includes/database.php");
require_once("includes/functions.php");
require_once("includes/topic.php");
require_once("includes/conference.php");


if(isset($_POST["submit"])){

    if(isset($_POST["search1"])){
        $search = $_POST["search1"];
        $search = preg_replace("#[^0-9a-z]#i","##",$search);

        $query  = "SELECT conference.confName, conference.confDate, conference.photoURL FROM conference ";
        $query .=  "WHERE conference.confName LIKE '%$search%' ORDER BY  conference.confName;";
        $sql = conference::find_by_sql($query);
        $counter = 0;
        $counter2 = 0;
        $array = array();
        foreach($sql as $s){
            foreach($s as $key) {
                if (isset($key)) {
                    $array[$counter] = $key;
                    $counter++;
                }
            }
            $counter2++;
        }
    }else{
        $search = $_POST["search2"];
        $search = preg_replace("#[^0-9a-z]#i","##",$search);


        $query = "SELECT conference.confName, conference.confDate, conference.photoURL, topic.topicName FROM conference
           INNER JOIN conftopic ON conference.ID = conftopic.confID
           INNER JOIN topic ON topic.ID = conftopic.topicID WHERE topic.topicName LIKE '%$search%'
           ORDER BY  conference.confName;";
        $sql = conference::find_by_sql($query);
        $counter = 0;
        $counter2 = 0;
        $array = array();
        foreach($sql as $s){
            foreach($s as $key) {
                if (isset($key)) {
                    $array[$counter] = $key;
                    $counter++;
                }
            }
            $counter2++;
        }

    }

}else{

    redirect_to("findconf.php");
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

    <title>RevCon | Found Conferences</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/findconf.js"></script>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>     <!--Head End-->

<body> <!-- /Body Start -->


<hr>

<div id="bodyContainer" class="container">

    <h1> Found Conferences </h1>
    <h6>Those are the results of your search</h6>

    <h3><?php
       if($counter2 != 1){
           echo $counter2 ." Conferences found";
       }else{
           echo $counter2 ." Conference found";
       }
        ?> </h3>

    <?php
    for($i = 0 ; $i<=$counter-1 ; $i+=3) {

        ?>
    <div class="row"> <!--EACH ROW IS FOR EACH CONFERENCE FOUND-->


        <div class="panel panel-success">


            <div class="panel-body">

                <div class="col-md-3">
                    <a type="hidden" href="conference.php?id=<?php echo $array[$i]; ?>">
                    <img src="<?php echo $array[$i + 2] ?>" class="img-thumbnail">
                </div>

                <div class="col-md-4">

                    <span class="row">
                        <p>Conference Name: <span><?php echo htmlentities($array[$i]) ?></span></p>
                        <p>Date: <span><?php echo htmlentities($array[$i+1]) ?></span></p>
                    </span>

                </div>


            </div>


        </div>



    </div>
    <?php
    }
    ?>

</body>     <!--BOdy ENd-->

<div class="container" id="FooterContainer">

    <footer>
        <div class="row">
            <div class="container text-center">
                <hr />
                <div class="row">
                    <div class="col-lg-12">
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
                            <li><a href="/">Copyright <?php echo htmlentities("© ");  echo date("Y",time()); ?>  Company Name.</a></li>
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
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</html>

