<?php
include_once("includes/navbar-user.php");
require_once("includes/database.php");
require_once("includes/functions.php");
require_once("includes/user.php");
require_once("includes/DatabaseObject.php");
require_once("includes/userimgs.php");
require_once("includes/session.php");

if(!isset($_SESSION["ID"]) || !isset($_GET["ID"])){
    redirect_to("conference.php");
}

if(isset($_POST["submit"])){// Form has been submitted.

    $paperName = $_POST["pName"];
    $author = $_POST["author"];
    $authorEmail = $_POST["authorEmail"];
    $abstract = $_POST["abstract"];
    $paperTopic = $_POST["ptopic"];


    $mysql_datetime = strftime("%Y-%m-%d", time());

    $new_paper = new paper();

    $new_paper->confID = $_GET["ID"];
    $new_paper->abstract = $abstract;
    $new_paper->paperName =$paperName;
    $new_paper->paperTopic = $paperTopic;
    $new_paper->dateSubmitted = $mysql_datetime;
    $new_paper->paperURL = "";

    if($new_paper->save()){
        redirect_to("conference.php?ID={$_GET["ID"]}");
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

    <title>Review + Paper Name</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootbox.js"></script>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->
<style>
    textarea {
        resize: none;
    }
</style>

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

<?php if (isset($_POST['error']))

{
?>
<div class="alert alert-danger">
   <p> <?php echo $_POST['error']; ?> </p>
</div>
<?php
}
?>


<hr>

<div id="bodyContainer" class="container">


    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
    <div class="panel panel-default col-lg-12">
        <div class="panel-heading">
            <h1 class="panel-title">General Information</h1>
        </div>
        <div class="panel-body" id="info">
            <div class="row well">
            <label>Paper Name :</label>
            <input type="text" class="form-control btn-block input-lg" name="pName">
            </div>
            <hr>
            <div class="row" id="author">
            <h3>Authors</h3>
            <div class="well" >
             <label >Author</label>
            <input type="text" class="form-control btn-block" name="author">

            <label >Author E-Mail</label>
            <input type="text" class="form-control btn-block" name="authorEmail">
<br>
                <input type="button" class="btn btn-warning" value="Add Author" id="AddAuthor">


                </div>
</div>

        <br>
<div class="row well">
        <h3>Write An Abstract</h3>
            <textarea rows="10" cols="50" name="abstract" class="col-lg-12" ></textarea>
</div>
            <hr>

            <div class="row">
                <h3>Choose The Paper Topics</h3>
                <h5>Choose from the conferences topics</h5>
</div>
            <div class="row well">
                <?php
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
                }?>

                <select class="form-control input-lg" id="sel1" name="ptopic">
                    <?php
                    for($i = 0;$i<=$counter-1;$i++) {
                    ?>
                    <option><?php echo htmlentities($array[$i])?></option>
                    <?php
                    }
                    ?>
                </select>

                <br>


            </div>

            <div class="row">
                <h3> Upload The Paper</h3>
            </div>

            <div class="row well">
                <div class="alert alert-danger">
                    <p>The uploaded paper should not exceed 7 pages, and should be written in IEEE Standards.</p>
                </div>
               <input name="fileToUpload" type="file" class="input-lg btn btn-success" accept=".pdf" >
            </div>


        </div>
        <div class="row text-center">

            <button type="submit" class="btn btn-success btn-lg" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger btn-lg">Reset</button>

        </div>

    </div>


</div>
</form>
<script>

    var AuthorsNo =1;


    $(document).ready(function () {
        $("#AddAuthor").click(function () {
            if (AuthorsNo<7) {


                $("#author").append(' <div class="well"> <label >Author</label> <input type="text" class="form-control btn-block" name="author"> <label >Author E-Mail</label> <input type="text" class="form-control btn-block" name="authorEmail"> <br> <input type="button" class="btn btn-warning" value="Add Author" id="AddAuthor"> </div>');

                AuthorsNo++;
            }

        });


    });


</script>


</body>
</html>


