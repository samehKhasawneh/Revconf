<?php

require_once("includes/session.php");
require_once("includes/paper.php");
require_once("includes/functions.php");
require_once("includes/conference.php");
require_once("includes/paperassign.php");
require_once("includes/reviewresults.php");
include_once("includes/navbar-user.php");

if(!isset($_SESSION["ID"]) || !isset($_GET["ID"])){
    redirect_to("conference.php");
}
$query = "SELECT userID FROM paperassign WHERE paperID = {$_GET["ID"]} AND userID = {$_SESSION["ID"]}";
$user = paperassign::find_by_sql($query);
if(!$user) {

    redirect_to("conference.php");
}

    $query = "SELECT userID FROM reviewresults WHERE paperID = {$_GET["ID"]}";
    $user = reviewresults::find_by_sql($query);

    $counter = 0;
    $array = array();
    foreach($user as $s) {
        foreach ($s as $key) {
            if (isset($key)) {
                $array[$counter] = $key;
                $counter++;
            }
        }

    }
$paper = paper::find_by_id($_GET["ID"]);
if(isset($array[0])) {
    if ($array[0] == $_SESSION["ID"]) {
        $session->setAttrb("message", "you have reviewed it you can't review it twice");
        redirect_to("review.php?ID={$paper->confID}");
    }
}





if(isset($_POST["submit"])){// Form has been submitted.

    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $q5 = $_POST["q5"];
    $q6 = $_POST["q6"];
    $q7 = $_POST{"q7"};
    $q8 = $_POST["q8"];
    $q9 = $_POST["q9"];
    $q10 = $_POST["q10"];

    $sum = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
    $sum = $sum*2;

    $rec = $_POST["recommendation"];
    $fam = $_POST["fam"];
    $sw = $_POST["sp1"];
    $mp = $_POST["sp2"];
    $com = $_POST["sp3"];

    $query2 = "INSERT INTO reviewresults (paperID,userID,recommendation,userFamiliarity,strengthWeakness,mainProblems,comments,rank) ";
    $query2 .= "VALUES ({$_GET["ID"]},{$_SESSION["ID"]},'{$rec}','{$fam}','{$sw}','{$mp}','{$com}',{$sum})";

    $result2 = reviewresults::execut_by_sql($query2);


    if($result2){

        redirect_to("review.php?ID={$paper->confID}");
    }

}else{



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
    <script src="js/jquery.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>


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
            <h1>Review Paper:</h1>
            <p><?php echo $paper->paperName ?></p>

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

        </tr>

        </thead>

        <tbody>

        <tr>
            <td><?php echo $paper->ID ?></td>
            <td style="color:red; font-weight: bold;"><?php echo $paper->paperName ?></td>
            <?php
            $conference = conference::find_by_id($paper->confID)
            ?>
            <td><?php echo $conference->confName ?></td>


        </tr>




        </tbody>



    </table>

<div class="row col-md-12 well">
<form>
    <iframe src="<?php echo $paper->paperURL ?>" width="100%" height="100% controls seamless frameborder="0" ></iframe>
</form>
    <form  role="form" method="post" action="paperReview.php?ID=<?php echo $_GET["ID"]?>">
    <fieldset>

        <legend>
            Recommendations
        </legend>

            <div class="col-lg-12">


                <fieldset class="radio"><label><input type="radio" name="recommendation" id="recommendation1" value="1"><strong>Reject:</strong> Content inappropriate to the conference or has little merit</label>
                    <br>
                    <label><input type="radio" name="recommendation" id="recommendation2" value="2"><strong>Probable Reject:</strong> Basic flaws in content or presentation or very poorly written</label>
                    <br>
                    <label><input type="radio" name="recommendation" id="recommendation3" value="3"><strong>Marginal Tend to Reject:</strong> Not as badly flawed; major effort necessary to make acceptable but content well-covered in literature already</label>
                    <br>
                    <label><input type="radio" name="recommendation" id="recommendation4" value="4"><strong>Marginal Tend to Accept:</strong> Content has merit, but accuracy, clarity, completeness, and/or writing should and could be improved in time</label>
                    <br>
                    <label><input type="radio" name="recommendation" id="recommendation5" value="5"><strong>Clear Accept:</strong> Content, presentation, and writing meet professional norms; improvements may be advisable but acceptable as is</label>
                    <br>
                    <label><input type="radio" name="recommendation" id="recommendation6" value="6"><strong>Must Accept:</strong> Candidate for outstanding submission. Suggested improvements still appropriate</label><br></fieldset>

                    <br>
                    <p><strong>Reviewer Familiarity with Subject Matter: </strong></p>
                    <label><input type="radio" name="fam" id="fam" value="1">Low </label>
                    <br>
                    <label><input type="radio" name="fam" id="fam" value="2">Moderate </label>
                    <br>
                    <label><input type="radio" name="fam" id="fam" value="3">High </label>


                 </div>


    </fieldset>

    <br>
    <br>
    <fieldset>
        <legend>
            General Evaluation (Please Rate for each iteml 1=unsatisfactory, 2=fair, 3=good, 4=Very Good, 5=Excellent)
            </legend>
<br>
            <div id="q1" >
                <p><strong>1)</strong> The abstract is clear and concise, including the specific objective of the work, the techniques employed and significant results.</p>
                <label><input type="radio" value="1" name="q1"> 1</label>
                <label><input type="radio" value="2" name="q1"> 2</label>
                <label><input type="radio" value="3" name="q1"> 3</label>
                <label><input type="radio" value="4" name="q1"> 4</label>
                <label><input type="radio" value="5" name="q1"> 5</label>
            </div>
<hr>
        <div id="q2">
            <p><strong>2)</strong> There are few grammatical errors and spelling mistakes in this article. </p>
            <label><input type="radio" value="1" name="q2"> 1</label>
            <label><input type="radio" value="2" name="q2"> 2</label>
            <label><input type="radio" value="3" name="q2"> 3</label>
            <label><input type="radio" value="4" name="q2"> 4</label>
            <label><input type="radio" value="5" name="q2"> 5</label>
        </div>

        <hr>

        <div id="q3">
            <p><strong>3)</strong> The research methods are adequately applied.  </p>
            <label><input type="radio" value="1" name="q3"> 1</label>
            <label><input type="radio" value="2" name="q3"> 2</label>
            <label><input type="radio" value="3" name="q3"> 3</label>
            <label><input type="radio" value="4" name="q3"> 4</label>
            <label><input type="radio" value="5" name="q3"> 5</label>
        </div>

        <hr>

        <div id="q4">
            <p><strong>4)</strong> The article is well organized. </p>
            <label><input type="radio" value="1" name="q4"> 1</label>
            <label><input type="radio" value="2" name="q4"> 2</label>
            <label><input type="radio" value="3" name="q4"> 3</label>
            <label><input type="radio" value="4" name="q4"> 4</label>
            <label><input type="radio" value="5" name="q4"> 5</label>
        </div>


        <hr>

        <div id="q5" >
            <p><strong>5)</strong> The tables and figures are clear and appropriate. </p>
            <label><input type="radio" value="1" name="q5"> 1</label>
            <label><input type="radio" value="2" name="q5"> 2</label>
            <label><input type="radio" value="3" name="q5"> 3</label>
            <label><input type="radio" value="4" name="q5"> 4</label>
            <label><input type="radio" value="5" name="q5"> 5</label>
        </div>

        <hr>
        <div id="q6" >
            <p><strong>6)</strong> The linguistic level and the mechanics of writing are appropriate for publication. </p>
            <label><input type="radio" value="1" name="q6"> 1</label>
            <label><input type="radio" value="2" name="q6"> 2</label>
            <label><input type="radio" value="3" name="q6"> 3</label>
            <label><input type="radio" value="4" name="q6"> 4</label>
            <label><input type="radio" value="5" name="q6"> 5</label>
        </div>
    <hr>
        <div id="q7" >
            <p><strong>7)</strong> The conclusions and interpretations are valid and they are supported by the data. </p>
            <label><input type="radio" value="1" name="q7"> 1</label>
            <label><input type="radio" value="2" name="q7"> 2</label>
            <label><input type="radio" value="3" name="q7"> 3</label>
            <label><input type="radio" value="4" name="q7"> 4</label>
            <label><input type="radio" value="5" name="q7"> 5</label>
        </div>
    <hr>

        <div id="q8" >
            <p><strong>8)</strong> The references and quotations are clear and the bibliography is updated and relevant.</p>
            <label><input type="radio" value="1" name="q8"> 1</label>
            <label><input type="radio" value="2" name="q8"> 2</label>
            <label><input type="radio" value="3" name="q8"> 3</label>
            <label><input type="radio" value="4" name="q8"> 4</label>
            <label><input type="radio" value="5" name="q8"> 5</label>
        </div>

        <hr>

        <div id="q9" >
            <p><strong>9)</strong> There are few technical errors in this article. </p>
            <label><input type="radio" value="1" name="q9"> 1</label>
            <label><input type="radio" value="2" name="q9"> 2</label>
            <label><input type="radio" value="3" name="q9"> 3</label>
            <label><input type="radio" value="4" name="q9"> 4</label>
            <label><input type="radio" value="5" name="q9"> 5</label>
        </div>


        <hr>

        <div id="q10">
            <p><strong>10)</strong> The paper presents new ideas and results that have not been previously published. </p>
            <label><input type="radio" value="1" name="q10"> 1</label>
            <label><input type="radio" value="2" name="q10"> 2</label>
            <label><input type="radio" value="3" name="q10"> 3</label>
            <label><input type="radio" value="4" name="q10"> 4</label>
            <label><input type="radio" value="5" name="q10"> 5</label>
        </div>
    </fieldset>






    <br>
    <br>
    <div class="col-md-12">

        <fieldset>
            <legend>
                Specific Comments and Suggestions
            </legend>


            <p><strong>Please state briefly the strengths and weaknesses of the article:  </strong></p>
            <textarea rows="6" cols="50" name="sp1" class="col-lg-12"></textarea>
            <br>


            <p><strong>Please describe the main problems of the article and give detailed suggestions on how to improve the article:  </strong></p>
            <textarea rows="6" cols="50" name="sp2" class="col-lg-12"></textarea>
            <br>

            <p><strong>Additional comments or suggestions to be sent to the author:  </strong></p>
            <textarea rows="6" cols="50" name="sp3" class="col-lg-12"></textarea>
            <br>






        </fieldset>

<br>
        <br>

    </div>


                <div class="text-center">

                    <input class="btn btn-success input-lg" type="submit" value="Submit" name="submit">
                    <input class="btn btn-warning input-lg" type="reset" value="Reset">
                    </div>
    </div>   <!--end of main div-->




</form>

</div>
<!----------------------------------->
<hr>
<hr>
<!----------------------------------->


<!----------------------------------->



</body>
</html>


