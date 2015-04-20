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
            <input type="text" class="form-control btn-block input-lg">
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
            <textarea rows="10" cols="50" name="sp1" class="col-lg-12"></textarea>
</div>
            <hr>

            <div class="row">
                <h3>Choose The Paper Topics</h3>
                <h5>Choose from the conferences topics</h5>
</div>
            <div class="row well">

                <select class="form-control input-lg" id="sel1">
                    <option>IT</option>
                    <option>Engineering</option>
                    <option>Business</option>
                    <option>Physics</option>
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

            <button type="submit" class="btn btn-success btn-lg">Submit</button>
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


