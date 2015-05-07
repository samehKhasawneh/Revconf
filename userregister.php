<?php
include_once("includes/navbar.php");
require_once("includes/database.php");
require_once("includes/functions.php");
require_once("includes/user.php");
require_once("includes/DatabaseObject.php");
require_once("includes/userimgs.php");
require_once("includes/session.php");
require_once("mail/mail.php");

if(isset($_SESSION["Email"])) {
    redirect_to("home.php");
}

$max_file_size = 1048576;

if (isset($_POST["submit"])) { // Form has been submitted.

    $target_dir = "imgUpload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $uploadOk = "ok";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    if ($uploadOk == "ok") {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $fname = trim($_POST["fname"]);
        $lname = trim($_POST["lname"]);
        $gender = trim($_POST["gender"]);
        $sdegree = trim($_POST["scientific_degree"]);
        $city = trim($_POST{"city"});
        $title = trim($_POST["title"]);

        $fb = trim($_POST["facebook"]);
        $li = trim($_POST["linkdin"]);
        $Am = trim($_POST["aboutme"]);
        $org = trim($_POST["org"]);

        $query = "SELECT * FROM user WHERE Email = '{$email}'";
        $found_user = user::find_by_sql($query);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if (empty($found_user)) {

                $newUser = new user();

                $mysql_datetime = strftime("%Y-%m-%d", time());

                $newUser->date_registered = $mysql_datetime;
                $newUser->FirstName = $fname;
                $newUser->LastName = $lname;
                $newUser->Email = $email;
                $newUser->Password = $password;
                $newUser->gender = $gender;
                $newUser->title = $title;
                $newUser->city = $city;
                $newUser->scientific_degree = $sdegree;


                if ($newUser->save()) {

                    $found_user = User::authenticate($email, $password);

                    if ($found_user) {

                        foreach ($found_user as $key => $value) {
                            $session->setAttrb($key, $value);
                        }
                        sendMail($email, "Welcome To RevConf", "Thank You FOr Registering");
                        redirect_to("home.php");
                    }

                }

            } else {
                $session->setAttrb("message", "Email is already in use combination incorrect.");
            }
        } else {
            $session->setAttrb("message", "Email is not in a correct format.");
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

    <title>RevCon | User Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/noty/buttons.css"/>
    <link rel="stylesheet" type="text/css" href="css/noty/animate.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/findconf.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/checkform.js"></script>
    <script src="js/noty/topRight.js"></script>
    <script src="js/noty/jquery.noty.packaged.min.js"></script>
    <script src="js/noty/notification_html.js"></script>


    <style>
        span#req {
            color: red;
            font-size: large;
        }
    </style>


    <link href="css/body.css" rel="stylesheet"> <!-- includes background color -->


</head>     <!--Head End-->
<hr>
<body> <!-- /Body Start -->

<div class="container">
        <div class="row">
             <h1>Register to RevCon</h1>
        </div>

    <div class="alert alert-info">Register to gain full access to RevCon</div>
    <div class="alert alert-danger">Note that the most common reason for failing to create an account is an incorrect email address so please type your email address correctly.</div>


    <div class="row"> <!-- Registration Info -->
        <label><?php echo $session->getAttrb("message"); ?></label>
        <h6>Please fill out the following form. The required fields are marked by (*)</h6>
    </div>

    <div id = "alert_placeholder" class="alert alert-danger"><h2 id="alertHeader"></h2></div>


    <div class="container  " id="formContainer"  >
    <form role="form" class="col-md-4" action="userregister.php" method="post" enctype="multipart/form-data">
            <!------------First Name --------->
        <div class="row form-group " >
            <div class="" ID="firstn">
                <label for="fname">First Name: <span id="req">*</span></label>
                <input type="text" class="form-control" id="fname" required name="fname">
            </div>
            </div>
        <!------------First Name --------->

        <!------------Last Name --------->
        <div class="row form-group">
            <div class="3" id="lastn">
                <label for="lname">Last Name: <span id="req">*</span></label>
            <input type="text" class="form-control"  id="lname" required name="lname">
            </div>
        </div>
        <!------------Last Name --------->

        <!------------title --------->
        <div class="row form-group">
            <div class="3" id="title">
                <label for="title">title<span id="req">*</span></label>
                <select class="form-control" name="title" required>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                </select>
            </div>
        </div>
        <!------------title --------->

        <!------------Email --------->
        <div class="row form-group">
            <div class="">
                <label for="mail">Email <span id="req">*</span></label>
                <input type="email" class="form-control" id="mail" required name="email">
            </div>
        </div>
        <!------------Email --------->

        <!------------Email CHeCK --------->
        <div class="row form-group">
            <div class="">
                <label for="mail2">Enter Email Again <span id="req">*</span></label>
                <input type="email" class="form-control" id="mail2"  required>
            </div>
        </div>
        <!------------Email check --------->

        <!------------Password 1 --------->
        <div class="row form-group">
            <div class="">
                <label for="pwd1">Password  <span id="req">*</span></label>
                <input type="password" class="form-control" id="pwd1" required name="password">
            </div>

        </div>

        <!------------Password  1--------->

        <!------------Password Check --------->
        <div class="row form-group">
            <div class="">
                <label for="pwd2">Enter Password again  <span id="req">*</span></label>
                <input type="password" class="form-control" id="pwd2" required>
            </div>
        </div>

        <!------------Password  Check--------->

        <!------------location --------->
        <div class="row form-group">
            <div class="3" id="city">
                <label for="city">Enter your City <span id="req">*</span></label>
                <input type="text" class="form-control"  id="city" required name="city">
            </div>
        </div>
        <!------------location --------->

        <!------------scientific_degree --------->
        <div class="row form-group">
            <div class="">
                <label for="scientific_degree">Select your Scientific Degree  <span id="req">*</span></label>
                <br>
                <select class="form-control" name="scientific_degree" required>
                    <option value="PHD">PHD</option>
                    <option value="MASTERS">MASTERS</option>
                    <option value="BC">BC</option>
                </select>
            </div>
        </div>
        <!------------scientific_degree --------->

        <!------------Last Name --------->
        <div class="row form-group">
            <div class="3" id="org">
                <label for="org">Your Organization : </label>
                <input type="text" class="form-control"  id="org"  name="org">
            </div>
        </div>
        <!------------Last Name --------->

        <!------------fb --------->
        <div class="row form-group">
            <div class="">
                <label for="facebook">Facebook  <span id="req">*</span></label>
                <br>
                <input type="text" class="form-control" name="facebook" >

            </div>
        </div>
        <!------------fb --------->


        <!------------linkdin --------->
        <div class="row form-group">
            <div class="">
                <label for="linkdin">linkdin  <span id="req">*</span></label>
                <br>
                <input type="text" class="form-control" name="linkdin" >

            </div>
        </div>
        <!------------linkdin --------->


        <!------------aboutme --------->
        <div class="row form-group">
            <div class="">
                <label for="aboutme">About Me  <span id="req">*</span></label>
                <br>
                <textarea type="text" class="form-control" name="aboutme" ></textarea>

            </div>
        </div>
        <!------------aboutme --------->






        <!------------picture --------->
        <div class="row form-group">
            <div class="" >
                <label for="pic">Upload a Picture<span id="req">* </span></label>
                <input type="file" name="fileToUpload"  >

            </div>
        </div>

        <!------------picture--------->


        <!------------Gender --------->
        <div class="row form-group">
            <div class="">
                <label for="gender">Select your Gender  <span id="req">*</span></label>
                <br>
                <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <!------------Gender --------->


<div class="text-center">
<hr>
    <button type="submit" id="submit" class="btn-lg btn-success" name="submit">Submit</button>
    <button type="reset" id="reset" class="btn-lg btn-danger">Reset</button>

</div>

    </form>

        <div class="col-md-2" >


        </div>

        <div class="col-md-5" id="pictureMiddlePage">
<hr>
            <hr>
            <h3 class="text-center">User Registration</h3>
            <img class="img-thumbnail" src="img/user.png" >


        </div>

    </div> <!-- Form Container -->

</div>



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


</html>

