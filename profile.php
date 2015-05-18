<?php

require_once("includes/DatabaseObject.php");
require_once("includes/database.php");
require_once("includes/session.php");
require_once("includes/functions.php");
require_once("includes/userinfo.php");
require_once("includes/userimgs.php");
require_once("includes/attendance.php");
require_once("includes/topic.php");
require_once("includes/conference.php");
require_once("includes/user.php");
include_once("includes/navbar-user.php");
include_once("mail/mail.php");

if (!isset($_SESSION["Email"]) && !isset($_GET["ID"])) {
    redirect_to("login.php");

}

if(isset($_SESSION["Email"])){
    $id = $_SESSION["ID"];
    }else{
    $id = $_GET["ID"] ;
}

if(isset($_GET["ID"])){
    if($_SESSION["ID"] !== $_GET["ID"]){
        $id = $_GET["ID"];
    }
}

$user_info = user::find_by_id($id);
if(empty($user_info)){
    $session->setAttrb("message","user is not found !!!");
    redirect_to("login.php");
}


$query1 = "SELECT imageURL FROM userimgs WHERE userID = {$id}";
$sql1 = userimgs::find_by_sql($query1);
$counter1 = 0 ;
$array1 = array();
foreach($sql1 as $s1){
    foreach($s1 as $key1){
        $array1[$counter1] = $key1;
        $counter1++;
    }
}

$query2 = "SELECT * FROM userinfo WHERE userID = {$id}";
$sql2 = userinfo::find_by_sql($query2) ;
$counter2 = 0 ;
$array2 = array();
foreach($sql2 as $s2){
    foreach($s2 as $key2){
        $array2[$counter2] = $key2;
        $counter2++;
    }
}


$query3 = "SELECT * FROM attendance WHERE userID = {$id}";
$sql3 = attendance::find_by_sql($query3) ;
$counter4 = 0 ;
$counter3 = 0;
$array3 = array();
foreach($sql3 as $s3){
    foreach($s3 as $key3){
        $array3[$counter3] = $key3;
        $counter3++;
    }
    $counter4++;
}



$sql = "SELECT topic.topicName FROM topic
                    INNER JOIN usertopic ON topic.ID = usertopic.topicID
                    INNER JOIN user ON user.ID = usertopic.userID WHERE user.ID ={$id}
                    ORDER BY topic.topicName";

$query = topic::find_by_sql($sql);

$c = 0;
$array = array();
foreach($query as $result){
    foreach($result as $key) {
        if (isset($key)) {
            $array[$c] = $key;
            $c++;
        }
    }
}

$sql2 = "SELECT conference.ID,conference.confName,conference.Location,conference.confDate FROM conference
                    INNER JOIN attendance ON conference.ID = attendance.confID
                    INNER JOIN user ON user.ID = attendance.userID WHERE user.ID ={$id}
                    ORDER BY conference.confName";

$query = conference::find_by_sql($sql2);

$c1 = 0;
$array4 = array();
foreach($query as $result2){
    foreach($result2 as $key4) {
        if (isset($key4)) {
            $array4[$c1] = $key4;
            $c1++;
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

    <title>


    </title>

    <!-- Bootstrap core CSS -->
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>




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


    <?php

    ?>
    <img id="profilephoto" src="<?php echo htmlentities($array1[1]); ?>" class="img-thumbnail img-circle " width="75%">

    <h1 class="text-center" id="userName">
        <?php
        echo ucfirst($user_info->FirstName);
        echo " ";
        echo ucfirst($user_info->LastName);
        ?>
    </h1>

<hr>
    <div class="table-responsive" >
        <table class="table">

            <tbody >
            <tr>
                <td><strong>City</strong></td>
                <td><?php echo htmlentities($user_info->city);?></td>
            </tr>
            <tr>
                <td><strong>Organization</strong></td>
                <td><?php if(isset($array2[3])){echo htmlentities($array2[3]);} ?></td>
            </tr>

            <tr>
                <td><strong>Join Date</strong></td>
                <td><?php echo htmlentities($user_info->date_registered);?></td>
            </tr>

            <tr>
                <td><strong>Number Of Attended Conferences</strong</td>
                <td>
                    <?php
                    echo htmlentities($counter4);
                    ?>
                </td>
            </tr>


            </tbody>
        </table>
    </div>


<div class="well text-center" >

    <a href="<?php if(isset($array2[1])){echo htmlentities($array2[1]);} ?>"><img src="img/fb.png" class="img-thumbnail " width="25%"></a>
    <a href="<?php if(isset($array2[2])){echo htmlentities($array2[2]);} ?>"> <img src="img/linkedin-icon.png" class="img-thumbnail " width="25%"></a>
        <a href="<?php echo htmlentities($user_info->Email); ?>"><img src="img/email.png" class="img-thumbnail " width="35%"></a>

</div>



</div>
<!--profile container div start-->
<div class="col-md-8" id="profileContainer">

    <!--            intro div start-->
    <div id="introDiv">
        <h2>About Me</h2>

        <div class="well">
            <?php
            if(isset($array2[4]))
             echo htmlentities($array2[4]);
            ?>
        </div>
    </div>

    <!--            intro div end-->


    <hr>
    <!--            topics div start-->
    <div id="topicsDiv">
        <h2>Prefered Topics</h2>

        <div class="well">

            <?php
            for($i = 0 ; $i<=$c-1 ; $i++) {
                ?>
                <p class="label label-primary">
                    <?php
                    echo htmlentities($array[$i]);
                    ?>
                </p>
            <?php
            }
            ?>
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


    <?php
    for($i = 0 ; $i<=$c1-1 ; $i+=4) {
    ?>
    <tr>
        <td><?php echo htmlentities($array4[$i+1]);?></td>
        <td><?php echo htmlentities($array4[$i+2]);?></td>
        <td><?php echo htmlentities($array4[$i+3]);?></td>
        <td><a class="btn btn-success" type="hidden" href="conference.php?ID=<?php echo $array4[$i]; ?>">Open</a> </td>
    </tr>
     <?php
    }
?>


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


