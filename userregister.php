<?php
include_once("includes/navbar.php");
require_once("includes/database.php");
require_once("includes/functions.php");
require_once("includes/user.php");
require_once("includes/DatabaseObject.php");
require_once("includes/userimgs.php");
require_once("includes/session.php");

if(isset($_SESSION["ID"])) {
    redirect_to("home.php");
}

$max_file_size = 1048576;

if (isset($_POST["submit"])) { // Form has been submitted.

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $gender = trim($_POST["gender"]);
    $sdegree = trim($_POST["scientific_degree"]);
    $city = trim($_POST{"city"});
    $title = trim($_POST["title"]);
    $age = trim($_POST["Age"]);



    $newUser = new user();

    $mysql_datetime = strftime("%Y-%m-%d", time());

    $newUser->date_registered = $mysql_datetime;
    $newUser->Age = $age;
    $newUser->FirstName = $fname;
    $newUser->LastName = $lname;
    $newUser->Email = $email;
    $newUser->Password = $password;
    $newUser->gender = $gender;
    $newUser->title = $title;
    $newUser->city = $city;
    $newUser->scientific_degree = $sdegree;

    $pic = trim($_POST["pic"]);
    $photo = new userimgs();
    $photo->userID = $_SESSION["ID"];
    $photo->attach_file($_FILES['pic']);


    if ($newUser->save()) {

        if($photo->save()){
        }else{
            $message = join("<br />", $photo->errors);
        }

        $found_user = User::authenticate($email, $password);

        if ($found_user) {

            foreach ($found_user as $key => $value) {
                $session->setAttrb($key, $value);
            }
            redirect_to("home.php");
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
        <h6>Please fill out the following form. The required fields are marked by (*)</h6>
    </div>

    <div id = "alert_placeholder" class="alert alert-danger"><h2 id="alertHeader"></h2></div>


    <div class="container  " id="formContainer"  >
    <form role="form" class="col-md-4" action="userregister.php" method="post">
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

        <!------------Age --------->
        <div class="row form-group">
            <div class="3" id="Age">
                <label for="Age">Age <span id="req">*</span></label>
                <input type="text" class="form-control"  id="Age" required name="Age">
            </div>
        </div>
        <!------------Age --------->

        <!------------title --------->
        <div class="row form-group">
            <div class="3" id="title">
                <label for="title">title<span id="req">*</span></label>
                <input type="text" class="form-control"  id="title" required name="title">
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
                <label for="scientific_degree">Select your Gender  <span id="req">*</span></label>
                <br>
                <select class="btn-lg" name="scientific_degree" required>
                    <option value="PHD">PHD</option>
                    <option value="MASTERS">MASTERS</option>
                    <option value="BC">BC</option>
                </select>
            </div>
        </div>
        <!------------scientific_degree --------->


        <!------------picture --------->
        <div class="row form-group">
            <div class="" >
                <label for="pic">Upload a Picture<span id="req">* <?php echo output_message($message); ?></span></label>
                <input type="hidden" name="pic" value="<?php echo $max_file_size; ?>" />
                <input class="" id="pic" type="file" name="pic">
            </div>
        </div>

        <!------------picture--------->


        <!------------Gender --------->
        <div class="row form-group">
            <div class="">
                <label for="gender">Select your Gender  <span id="req">*</span></label>
                <br>
                <select class="btn-lg" name="gender" required>
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

