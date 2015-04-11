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
            <h1>Review Paper:</h1>
            <p>an Implementation to a Unix Based Compiler</p>

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
            <td>12</td>
            <td style="color:red; font-weight: bold;">an Implementation to a Unix Based Compiler</td>
            <td>PSUT MINA 15 </td>


        </tr>




        </tbody>



    </table>

<div class="row col-md-12 well">

    <iframe src="http://localhost/pdf/web/helloworld.pdf" width="100%" height="100% controls seamless frameborder="0" ></iframe>

    <fieldset id="fs_review"><legend>Review</legend><div class="field"><label class="plain">Recommendation:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="recommendation" id="recommendation1" value="1">Reject: Content inappropriate to the conference or has little merit</label><br><label><input type="radio" name="recommendation" id="recommendation2" value="2">Probable Reject: Basic flaws in content or presentation or very poorly written</label><br><label><input type="radio" name="recommendation" id="recommendation3" value="3">Marginal Tend to Reject: Not as badly flawed; major effort necessary to make acceptable but content well-covered in literature already</label><br><label><input type="radio" name="recommendation" id="recommendation4" value="4">Marginal Tend to Accept: Content has merit, but accuracy, clarity, completeness, and/or writing should and could be improved in time</label><br><label><input type="radio" name="recommendation" id="recommendation5" value="5" checked="">Clear Accept: Content, presentation, and writing meet professional norms; improvements may be advisable but acceptable as is</label><br><label><input type="radio" name="recommendation" id="recommendation6" value="6">Must Accept: Candidate for outstanding submission. Suggested improvements still appropriate</label><br></fieldset></div>
        <div class="field"><label class="plain">Submission Categorization:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="category" id="category1" value="1">Highly theoretical</label><br><label><input type="radio" name="category" id="category2" value="2" checked="">Tends towards theoretical</label><br><label><input type="radio" name="category" id="category3" value="3">Balanced theory and practice</label><br><label><input type="radio" name="category" id="category4" value="4">Tends toward practical</label><br><label><input type="radio" name="category" id="category5" value="5">Highly practical</label><br></fieldset></div>
        <div class="field"><label class="plain">Overall Value Added to the Field:</label><label>&nbsp;</label><fieldset class="checkbox"><label><input type="checkbox" name="value[]" id="value1" value="1" checked="">New information</label><br><label><input type="checkbox" name="value[]" id="value2" value="2">Valuable confirmation of present knowledge</label><br><label><input type="checkbox" name="value[]" id="value3" value="3">Clarity to present understanding</label><br><label><input type="checkbox" name="value[]" id="value4" value="4" checked="">New perspective, issue, or problem definition</label><br><label><input type="checkbox" name="value[]" id="value5" value="5">Not much</label><br><label><input type="checkbox" name="value[]" id="value6" value="6">Other</label><br></fieldset><div class="fieldnote note">Check as many as appropriate</div></div>
        <div class="field"><label class="plain">Reviewer Familiarity with Subject Matter:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="familiar" id="familiar1" value="Low">Low</label><br><label><input type="radio" name="familiar" id="familiar2" value="Moderate">Moderate</label><br><label><input type="radio" name="familiar" id="familiar3" value="High" checked="">High</label><br></fieldset><div class="fieldnote note">Relates to the confidence you have in your review</div></div>
        <div class="field"><label class="plain">Is this submission a candidate for the best submission award:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="bpcandidate" id="bpcandidate1" value="Yes" checked="">Yes</label><br><label><input type="radio" name="bpcandidate" id="bpcandidate2" value="No">No</label><br><label><input type="radio" name="bpcandidate" id="bpcandidate3" value="Unsure">Unsure</label><br></fieldset></div>
        <div class="field"><label class="plain">Is the submission length appropriate:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="length" id="length1" value="Yes" checked="">Yes</label><br><label><input type="radio" name="length" id="length2" value="No">No</label><br><label><input type="radio" name="length" id="length3" value="Unsure">Unsure</label><br></fieldset></div>
        <div class="field"><label class="plain">If from reading the submission you know who the author is, how different is this from earlier submissions on the same topic by the same author? That is, is it the same as or a slight modification of other submissions, with little or no new information:</label><label>&nbsp;</label><fieldset class="radio"><label><input type="radio" name="difference" id="difference1" value="1">Totally or largely different from other submissions</label><br><label><input type="radio" name="difference" id="difference2" value="2" checked="">Moderately different from other submissions</label><br><label><input type="radio" name="difference" id="difference3" value="3">Totally or largely identical to other submissions</label><br><label><input type="radio" name="difference" id="difference4" value="4">Don't know</label><br></fieldset><div class="fieldnote note">We use these suggestions in assigning submissions to sessions for the conference, but not in determining whether the submission is accepted)</div></div>
        <div class="field"><label class="plain">Which of the following session(s) would be the most appropriate for this submission:</label><label>&nbsp;</label><fieldset class="checkbox"><label><input type="checkbox" name="sessions[]" id="sessions1" value="1" checked="">Classic Papers</label><br><label><input type="checkbox" name="sessions[]" id="sessions2" value="2">Programming</label><br><label><input type="checkbox" name="sessions[]" id="sessions3" value="3">RFC</label><br><label><input type="checkbox" name="sessions[]" id="sessions4" value="4">Computer Science</label><br><label><input type="checkbox" name="sessions[]" id="sessions5" value="5">Networking</label><br><label><input type="checkbox" name="sessions[]" id="sessions6" value="6">Humo(u)r</label><br></fieldset><div class="fieldnote note">We use these suggestions in assigning submissions to sessions for the conference, but not in determining whether the submission is accepted)</div></div>
        <div class="field"><label for="authorcomments" class="plain">Comments for the Authors:</label><label>&nbsp;</label><textarea name="authorcomments" id="authorcomments" cols="60" rows="5" maxlength="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vivamus lectus. Suspendisse potenti. Proin velit. Proin vehicula justo sit amet massa. Cras rhoncus pellentesque dolor. Integer placerat, tellus id porta posuere, lacus est feugiat leo, eget sollicitudin augue nibh in augue.</textarea><div class="fieldnote note">Constructive comments to the author(s) would be appreciated.</div></div>
        <div class="field"><label for="pccomments" class="plain">Comments for the Program Committee (authors will not see these comments):</label><label>&nbsp;</label><textarea name="pccomments" id="pccomments" cols="60" rows="5" maxlength="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vivamus lectus. Suspendisse potenti. Proin velit. Proin vehicula justo sit amet massa. Cras rhoncus pellentesque dolor. Integer placerat, tellus id porta posuere, lacus est feugiat leo, eget sollicitudin augue nibh in augue.</textarea><div class="fieldnote note">Reasons must be included for all submissions, because they help us determine what to do when reviewers disagree with each other.</div></div>
    </fieldset>


    </div>



</div>
<!----------------------------------->
<hr>
<hr>
<!----------------------------------->


<!----------------------------------->



</body>
</html>


