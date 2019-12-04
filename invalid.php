<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Diary || Invalid Request</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.js" type="text/javascript"></script>

  <?php if ((@$_GET['q1'] == 1) || @$_GET['eeid']) echo '<script src="ckeditor/ckeditor.js" type="text/javascript"></script>'; ?>
  
  <!--alert message-->
  <?php if (@$_GET['w']) { echo '<script>alert("' . @$_GET['w'] . '");</script>';}?>
  <!--alert message end-->

  <style>
    body {
      font-family: serif;
    }
    </style>
</head>

<body>
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
    <p class="text-danger" style="font-size:30px; text-align:center; padding-top:20%">Sorry Invalid Request....</p>
  </div>  
  
</body>
</html>