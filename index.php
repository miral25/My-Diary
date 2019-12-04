<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Diary || Home</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script>
        function validateForm() {
            var y = document.forms["form"]["name"].value;
            var letters = /^[A-Za-z]+$/;
            if (y == null || y == "") {
                alert("Name must be filled out.");
                return false;
            }
            var z = document.forms["form"]["age"].value;
            if (z == null || z == "") {
                alert("Age must be filled out.");
                return false;
            }
            var x = document.forms["form"]["email"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                alert("Not a valid e-mail address.");
                return false;
            }
            var a = document.forms["form"]["password"].value;
            if (a == null || a == "") {
                alert("Password must be filled out");
                return false;
            }
            if (a.length < 6 || a.length > 20) {
                alert("Passwords must be 6 to 20 characters long.");
                return false;
            }
            var b = document.forms["form"]["cpassword"].value;
            if (a != b) {
                alert("Passwords must match.");
                return false;
            }
        }
    </script>

    <!--alert message-->
    <?php if (@$_GET['w']) {
        echo '<script>alert("' . @$_GET['w'] . '");</script>';
    }
    ?>
    <!--alert message end-->

    <style>
        body {
            font-family: serif;
        }

        #bsignup {
            width: 100%;
            font-size:18px ;
        }
    </style>

</head>

<body>
    <?php
    include_once 'dbConnection.php';
    session_start();
    if ((isset($_SESSION['email']))) {
        header("location:account.php?q1=1");
    }
    ?>

    <!--header start-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="font-size: 250%; font-weight: bold;">My Diary</a>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="aboutus.php" style="font-size: 200%; ">Contact Us</a>
                </li>
            </ul>

        </div>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal" style="background-color:white;color: #1DA1F2; width:10% ; margin-right:8%; font-size:18px;">Sign In</button>
    </nav>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #1DA1F2; font-size: 200%;">Log In</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="login.php?q=index.php" method="POST">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email"></label>
                                <div class="col-md-6">
                                    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password"></label>
                                <div class="col-md-6">
                                    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">

                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary active">Log in</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: #1DA1F2;">Close</button>
                    </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--header end-->

    <h1 style="text-align:right ;color:#1DA1F2; margin-top:5% ;padding-right: 13%">Register Here</h1>

    <div class="bg">
        <div class="row">
            <div class="col-md-8"></div>
                <div class="col-md-3 panel">

                <!-- sign in form begins -->
                <form class="form-horizontal" name="form" action="sign.php?q=account.php?q=1" onSubmit="return validateForm()" method="POST">
                    <fieldset>

                        <!-- Text input Name-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name"></label>
                            <div class="col-md-12">
                                <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">

                            </div>
                        </div>

                        <!-- Text input Age-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="age"></label>
                            <div class="col-md-12">
                                <input id="age" name="age" placeholder="Enter your age" class="form-control input-md" type="number" min="12">

                            </div>
                        </div>

                        <!-- Text input Gender-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="gender"></label>
                            <div class="col-md-12">
                                <select id="gender" name="gender" placeholder="Enter your gender" class="form-control input-md">
                                    <option value="Male">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input Email-->
                        <div class="form-group">
                            <label class="col-md-12 control-label title1" for="email"></label>
                            <div class="col-md-12">
                                <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">

                            </div>
                        </div>

                        <!-- Text input Password-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="password"></label>
                            <div class="col-md-12">
                                <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">

                            </div>
                        </div>

                        <!-- Rewrite Password-->
                        <div class="form-group">
                            <label class="col-md-12control-label" for="cpassword"></label>
                            <div class="col-md-12">
                                <input id="cpassword" name="cpassword" placeholder="Conform Password" class="form-control input-md" type="password">

                            </div>
                        </div>

                        <?php if (@$_GET['q7']) {
                            echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
                        } ?>

                        <!--Sign Up Button -->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12">
                                <input type="submit" id="bsignup" class="btn btn-outline-primary" value="Sign Up it's free" />
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</body>
</html>