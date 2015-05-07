<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">


            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home </a></li>
                <li><a href="#">Conferences</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>


            <div class="nav navbar-nav col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->



                <ul class="nav navbar-nav navbar-right">

                    <li class="active dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo ucfirst($_SESSION['FirstName'])?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile.php">Profile</a></li>

                            <li class="divider"></li>

                            <li><a href="logout.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>

        </div><!--/.navbar-collapse -->
    </div>
</nav>