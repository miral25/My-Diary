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

  <!--alert message-->
  <?php 
    if (@$_GET['w'])
    {
      echo '<script>alert("' . @$_GET['w'] . '");</script>';
    }
  ?>
  <!--alert message end-->

  <style>
    body {
      font-family: serif;
    }

    .bg {
      background-size: cover;
      background-repeat: no-repeat;
    }

    .miral {
      position: absolute;
      margin-left: 20%;
      z-index: 1;
    }

    .miral_img {
      position: absolute;
      width: 200px;
      height: 200px;
      margin-left: 5%;
      z-index: 1;
    }

    .lavin {
      position: absolute;
      margin-left: 20%;
      z-index: 1;
      margin-top: 15%;
    }

    .lavin_img {
      position: absolute;
      width: 200px;
      height: 200px;
      margin-left: 5%;
      z-index: 1;
      margin-top: 15%;
    }

    .ritika {
      position: absolute;
      margin-left: 20%;
      z-index: 1;
      margin-top: 30%;
    }

    .ritika_img {
      position: absolute;
      width: 200px;
      height: 200px;
      margin-left: 5%;
      z-index: 1;
      margin-top: 30%;
    }

    .maps {
      position: absolute;
      width: 500px;
      height: 500;
      border: 0;
      margin-left: 60%;
      z-index: 2;
    }
  </style>
</head>

<body background="img/bg1.jpg" class="bg">

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
  </nav>
  <!--header end-->

  <div>
    <div class="miral">
      <h2>Miral Gandhi</h2>
      <p style="font-size:20px;">
        <b>Phone No:</b> 7506684724 <br>
        <b>Email Id:</b> miral.gandhi4@gmail.com
      </p>
    </div>
    <img src="img/miral.jpg" class="miral_img">

    <div class="ritika">
      <h2>Ritika Sakpal</h2>
      <p style="font-size:20px;">
        <b>Phone No:</b> 9769336476 <br>
        <b>Email Id:</b> ritikasakpal23@gmail.com
      </p>
    </div>
    <img src="img/Ritika1.jpg" class="ritika_img">

    <div class="lavin">
      <h2>Lavin Amarnani</h2>
      <p style="font-size:20px;">
        <b>Phone No:</b>8584675639<br>
        <b>Email Id:</b> amarnani.lavin@gmail.com
      </p>
    </div>
    <img src="img/lavin.jpg" class="lavin_img">
  </div>

  <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.9834629561515!2d72.8336715144289
                  !3d19.064464687094482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c91130392c07%3A0x3c47bf391c8de931
                  !2sThadomal%20Shahani%20Engineering%20College!5e0!3m2!1sen!2sin!4v1570031015186!5m2!1sen!2sin" width="300" height="450" frameborder="0" allowfullscreen="" class="maps"></iframe>
    <h3 style="padding-top:32%; margin-left:63%"><b>Thadomal Shahani Engineering College</b></h3>
    <p style="font-size:20px; margin-left:63%">
      <b>Phone No:</b> +91–022–2649 5808
  </div>
</body>
</html>