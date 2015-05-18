<?php

require_once("includes/database.php");
require_once("includes/functions.php");
require_once("includes/session.php");
require_once("includes/user.php");
require_once("includes/DatabaseObject.php");
require_once("includes/userimgs.php");
require_once("includes/paper.php");
require_once("includes/topic.php");
require_once("includes/conference.php");
include_once("includes/navbar-user.php");
$notPDF=0;
$ok=0;
$session;
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
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <!--    <script src="includes/pdf.worker.js"></script>-->
    <script src="includes/pdf.js"></script>


    <script src="js/bootbox.js"></script>





    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->
    <style>
        textarea {
            resize: none;
        }
    </style>

</head>
<body>
<form name="myform"  action="" method="post">
    <input type="text" hidden="hidden"  name="error" id="error">
</form>


<?php






if(!isset($_SESSION["ID"]) && !isset($_GET["ID"])){
    redirect_to("conference.php");
}

$query2 = "SELECT conference.ID FROM conference INNER JOIN attendance ON conference.ID = attendance.confID WHERE attendance.userID = {$_SESSION["ID"]}";
$conferences = conference::find_by_sql($query2);
$counter1 = 0;
$array1 = array();
foreach($conferences as $conf){
    foreach($conf as $key) {
        if (isset($key)) {
            $array1[$counter1] = $key;
            $counter1++;
        }
    }
}
if(!(in_array($_GET["ID"],$array1))){
    redirect_to("home.php");
}





$conference = conference::find_by_id($_GET["ID"]);


if(isset($_POST["submit"]) )
{
// Form has been submitted.

    if(!isset($_POST['paperURL']))
    {
        $session->setAttrb("message","No Paper uploaded. Please Upload a Paper");
        redirect_to("paperSubmit.php?ID={$_GET["ID"]}");

    }

            $paperName = $_POST["pName"];
            $author = $_POST["author"];
            $authorEmail = $_POST["authorEmail"];
            $abstract = $_POST["abstract"];
            $paperTopic = $_POST["ptopic"];
            $paperURL = $_POST['paperURL'];

            $mysql_datetime = strftime("%Y-%m-%d", time());

            $new_paper = new paper();

            $new_paper->userID = $_SESSION["ID"];
            $new_paper->confID = $_GET["ID"];
            $new_paper->abstract = $abstract;
            $new_paper->paperName = $paperName;
            $new_paper->paperTopic = $paperTopic;
            $new_paper->dateSubmitted = $mysql_datetime;
            $new_paper->author = $author;
            $new_paper->authorEmail = $authorEmail;
            $new_paper->paperURL = $paperURL;


            if ($new_paper->save()) {
//                redirect_to("conference.php?ID={$_GET["ID"]}");
                echo "saved";
            } else {
                echo "error";
            }


        }



else
 {
//    redirect_to("paperSubmit.php?ID={$_GET["ID"]}");



}





?>






<!-- /Body Start -->
<div class="jumbotron">
    <div class="container">

        <div class="text-center">
            </br>
            </br>
            <h1>Submit a Paper to:</h1>
            <p><?php echo htmlentities($conference->confName)?></p>

        </div>

    </div>
</div>

<?php if (isset($_POST['error']))

{
?>
<div class="alert alert-danger">
    <p> <?php echo $session->getAttrb("message");?> </p>
   <p> <?php echo $_POST['error']; ?> </p>
</div>
<?php
}

?>


<hr>

<div id="bodyContainer" class="container">


    <form action="paperSubmit.php?ID=<?php echo $_GET["ID"];?>" method="post" enctype="multipart/form-data">
    <div class="panel panel-default col-lg-12">
        <div class="panel-heading">
            <h1 class="panel-title">General Information</h1>
        </div>
        <div class="panel-body" id="info">
            <div class="row well">
            <label>Paper Name :</label>
            <input type="text" class="form-control btn-block input-lg" name="pName" required="required">
            </div>
            <hr>
            <div class="row" id="author">
            <h3>Authors</h3>
            <div class="well" >
             <label >Author</label>
            <input type="text" class="form-control btn-block" name="author" required="required">

            <label >Author E-Mail</label>
            <input type="text" class="form-control btn-block" name="authorEmail" required="required">
            <input type="hidden" id="paperURL" name="paperURL">
<br>



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
                <div class="row" style="padding-top:10px;">
                    <div class="col-xs-2">
                        <button id="uploadBtn" class="btn btn-large btn-primary">Choose File</button>
                    </div>
                    <div class="col-xs-10">
                        <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                            <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-xs-10">
                        <div id="msgBox">
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/imgUpload/SimpleAjaxUploader.min.js"></script>
            <script>
                function escapeTags( str ) {
                    return String( str )
                        .replace( /&/g, '&amp;' )
                        .replace( /"/g, '&quot;' )
                        .replace( /'/g, '&#39;' )
                        .replace( /</g, '&lt;' )
                        .replace( />/g, '&gt;' );
                }

                window.onload = function() {

                    var btn = document.getElementById('uploadBtn'),
                        progressBar = document.getElementById('progressBar'),
                        progressOuter = document.getElementById('progressOuter'),
                        msgBox = document.getElementById('msgBox');

                    var uploader = new ss.SimpleUpload({
                        button: btn,
                        url: 'pdf_upload.php',
                        name: 'uploadfile',
                        hoverClass: 'hover',
                        focusClass: 'focus',
                        allowedExtensions: ['pdf'],
                        responseType: 'json',
                        startXHR: function() {
                            progressOuter.style.display = 'block'; // make progress bar visible
                            this.setProgressBar( progressBar );
                        },
                        onSubmit: function() {
                            msgBox.innerHTML = ''; // empty the message box
                            btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                        },
                        onComplete: function( filename, response ) {

                            console.log("hello");
                            alert("hello");
                            var pages=0;
                            var file = filename;
                            var dir = "uploads/"+file;

                            PDFJS.workerSrc = "includes/pdf.worker.js";


                            PDFJS.getDocument(dir).then(function(pdf) {


                                    pages = pdf.pdfInfo.numPages;
                                    alert(pages);

                                    if (pages > 7) {

                                        alert("pages are" + pages);
                                        $("#error").val("more than 7 pages");
                                        document.myform.submit();



                                    }

                                    else
                                    {
                                        alert("We are in alse, less than 7 pages "+pages);
                                    }



                                }

                            );


                            btn.innerHTML = 'Choose Another File';
                            progressOuter.style.display = 'none'; // hide progress bar when upload is completed

                            if ( !response ) {
                                msgBox.innerHTML = 'Unable to upload file';
                                return;
                            }

                            if ( response.success === true ) {
                                msgBox.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
                                var file2 = filename;
                                var dir2 = "uploads/"+file2;
                                $("#paperURL").val(dir2);

                            } else {
                                if ( response.msg )  {
                                    msgBox.innerHTML = escapeTags( response.msg );

                                } else {
                                    msgBox.innerHTML = 'An error occurred and the upload failed.';
                                }
                            }
                        },
                        onError: function() {
                            progressOuter.style.display = 'none';
                            msgBox.innerHTML = 'Unable to upload file';
                        }
                    });
                };

            </script>
            </div>


        </div>
        <div class="row text-center">

            <button type="submit" class="btn btn-success btn-lg" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger btn-lg">Reset</button>

        </div>

    </div>


</div>
</form>


</body>
</html>


