<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Diary || Account</title>
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<?php if ((@$_GET['q1'] == 1) || @$_GET['eeid']) echo '<script src="ckeditor/ckeditor.js" type="text/javascript"></script>'; ?>
	
	<!--alert message-->
	<?php if (@$_GET['w']) {
		echo '<script>alert("' . @$_GET['w'] . '");</script>';
	}
	?>
	<!--alert message end-->
	<script>
		function validateForm() {
			var y = document.forms["form"]["title"].value;
			if (y == null || y == "") {
				alert("Title must be filled out.");
				return false;
			}
		}
	</script>

	<style>
		body {
			font-family: serif;
		}

		.main {
			padding-left: 2%;
			padding-right: 2%;
			width: 100%;
		}
	</style>
</head>

<body>
	<!--header start-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="index.php" style="font-size: 250%; font-weight: bold;">My Diary</a>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link active" href="aboutus.php" style="font-size: 200%;padding-top:15%">Contact Us&nbsp;</a>
				</li>
				<li class="nav-item">
					<div class="nav-link active<?php if (@$_GET['q1'] == 1) echo 'active'; ?>" style="font-size: 200%; ">
						<a class="nav-link active" href="account.php?q1=1"><span class="glyphicon glyphicon-pencil">Compose</span></a>
					</div>
				</li>
				<li class="nav-item">
					<div class="nav-link active<?php if (@$_GET['q1'] == 2) echo 'active'; ?>" style="font-size: 200%; padding-top:5%">
						<a class="nav-link" href="account.php?q1=2"><span class="glyphicon glyphicon-briefcase"></span> Entries</a>
					</div>
				</li>
				<li class="nav-item">
					<div class="nav-link active<?php if (@$_GET['q1'] == 3) echo 'active'; ?>" style="font-size: 200%; padding-top:5%">
						<a class="nav-link" href="account.php?q1=3"><span class="glyphicon glyphicon-star-empty">Starred</span></a>
					</div>
				</li>
			</ul>

		</div>

		<?php
		include_once 'dbConnection.php';
		session_start();
		if (!(isset($_SESSION['email']))) 
		{
			header("location:index.php");
		} 
		else 
		{
			$name = $_SESSION['name'];
			include_once 'dbConnection.php';
			echo '<span style="color:white; font-weight: bold; font-size: 22px;">&nbsp;Hello,&nbsp<a href="account.php?q1=2" style="color:white; font-weight: bold; font-size: 22px;">' . $name . '</span> </a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp<a href="logout.php?q=account.php" style="color: #1DA1F2; ; margin-right:8%"><button type="button" class="btn btn-secondary" style="color: #1DA1F2; ; margin-right:120%">Sign Out</button></a>';
		} ?>
	</nav>
	<!--header end-->

	
	<div class="main">
		<!--Compose-->
		<?php if (@$_GET['q1'] == 1) {
			echo   '<form style="margin:25px" name="form" action="form.php?q=account.php" onSubmit="return validateForm()" method="POST">
					<div class="form-group">
						<label for="title" style="font-width:bold; font-size:18px">Write Title:</label>
						<input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
					</div>
					<div class="form-group">
						<label for="editor" style="font-width:bold; font-size:18px">Write your feeling:</label>
						<textarea class="form-control ckeditor" id="editor" name="text"></textarea>
						<script type="text/javascript">						
							CKEDITOR.replace( "editor",	{ removeButtons: "Source,About",} );
						</script> 
					</div>
					<div class="form group">
						<input type="submit" value="Save" class="btn btn-info btn-block" /></div>
					</form>';	
		} ?>
		<!--Compose closed-->

		<!--Entries start-->
		<?php if (@$_GET['q1'] == 2) {
			$email = $_SESSION["email"];
			$result = mysqli_query($con, "SELECT * FROM `articles` WHERE email = '$email' ORDER BY `articles`.`date` DESC") or die('Error');
			echo  ' <table class="table table-hover"><thead>
					<tr style="font-width=bold; font-size:25px" >
						<th scope="col" align="center">Stared</th>
						<th scope="col">Title</th>
						<th scope="col">Date</th>
						<th scope="col">Time</th>
						<th scope="col" style="text-align:center;">View</th>
						<th scope="col" style="text-align:center;">Edit</th>
						<th scope="col" style="text-align:center;">Delete</th>
					</tr></thead> <tbody style="font-size:18px" >';

			while ($row = mysqli_fetch_array($result)) {
				$date = $row['date'];
				$date = date("d-m-Y", strtotime($date));
				$time = $row['time'];
				$title = $row['title'];
				$star = $row['star'];
				$id = $row['id'];

				if ($star == 0) 
					echo '<tr><td><a title="not starred" href="update.php?sid=' . $id . '">
					<b><span class="glyphicon glyphicon-star"></span></b></a></td>';
				else 
					echo '<tr><td><a title="Starred" href="update.php?sid=' . $id . '">
					<span class="glyphicon glyphicon-star" style="color:orange" ></span></a></td>';

				echo '<td><a title="Click to open article" href="account.php?aid=' . $id . '">' . $title . '</a></td>
				<td>'. $date . '</td><td>' . $time . '</td>';

				echo '<td align="center"><a title="Open Article" href="account.php?aid=' . $id . '">
				<b class="glyphicon glyphicon-folder-open" aria-hidden="true"></b></a></td>';				

				echo '<td align="center"><a title="Edit Article" href="account.php?eeid=' . $id . '">
				<b span class="glyphicon glyphicon-pencil" aria-hidden="true"></b></a></td>';

				echo '<td align="center"><a title="Delete Article" href="update.php?did=' . $id . '">
						<b class="glyphicon glyphicon-trash" aria-hidden="true"></b></a></td></tr>';
			}

			echo '</tbody></table>';
		}
		?>
		<!--Entries closed-->

		<!--edit article start-->
		<?php if (@$_GET['eeid']) {
			$id = @$_GET['eeid'];
			$result = mysqli_query($con, "SELECT * FROM `articles` WHERE id='$id' ") or die('Error');

			while ($row = mysqli_fetch_array($result)) {
				$title = $row['title'];
				$article = $row['article'];
				$email = $row['email'];
				if ($email == $_SESSION['email']) {

				echo'<form style="margin:25px" name="form" action="form.php?q=account.php" onSubmit="return validateForm()" method="POST">
						<div class="form-group">
							<label for="title" style="font-width:bold; font-size:18px">Write Title: </label>
							<input type="text" name="title" value=" ' . $title . '" class="form-control" id="title" placeholder="Enter title">
						</div>
						<div class="form-group">
							<label for="editor" style="font-width:bold; font-size:18px">Write your feeling:</label>
							<textarea class="form-control ckeditor" id="editor" name="text">' . $article . '</textarea>
							<script type="text/javascript">
								CKEDITOR.replace( "editor", { removeButtons: "Source,About", });
							</script> 
						</div>
						<div class="form group">
							<input type="submit" value="Save" class="btn btn-info btn-block" />
						</div>
					</form>';
					$result1 = mysqli_query($con, "DELETE FROM articles WHERE id='$id' ") or die('Error');
				}
			}
		} ?>
		<!--edit article end-->

		<!--Starred start-->
		<?php if (@$_GET['q1'] == 3) {
			$email = $_SESSION["email"];
			$result = mysqli_query($con, "SELECT * FROM `articles` WHERE email = '$email' ORDER BY `articles`.`date` DESC") or die('Error');
			echo  '<table class="table table-hover"><thead>
			<tr style="font-width=bold; font-size:25px" >
				<th scope="col" align="center">Stared</th>
				<th scope="col">Title</th>
				<th scope="col">Date</th>
				<th scope="col">Time</th>
				<th scope="col" style="text-align:center;">View</th>
				<th scope="col" style="text-align:center;">Edit</th>
				<th scope="col" style="text-align:center;">Delete</th>
			</tr></thead> <tbody style="font-size:18px" >';
			while ($row = mysqli_fetch_array($result)) {
				$date = $row['date'];
				$date = date("d-m-Y", strtotime($date));
				$time = $row['time'];
				$title = $row['title'];
				$star = $row['star'];
				$id = $row['id'];
				$share = $row['share'];
				if ($star == 1) {
					echo '<tr><td><a title="starred" href="update.php?sid=' . $id . '">
					<b><span class="glyphicon glyphicon-star" style="color:orange"></span></b></a></td>';

					echo '<td><a title="Click to open article" href="account.php?aid=' . $id . '">' . $title . '</a>
					</td><td>' . $date . '</td><td>' . $time . '</td>

					<td align="center"><a title="Open Article" href="account.php?aid=' . $id . '">
					<b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
					
					echo '<td align="center"><a title="Edit Article" href="account.php?eeid=' . $id . '">
					<b><span class="glyphicon glyphicon-pencil"></span></b></a></td>
					
					<td align="center"><a title="Delete Article" href="update.php?did=' . $id . '">
					<b><span class="glyphicon glyphicon-trash"></span></b></a></td></tr>';
				}
			}

			echo '</tbody></table>';
		}
		?>
		<!--Starred closed-->

		<!--View Article start-->
		<?php if (@$_GET['aid']) {
			$id = @$_GET['aid'];
			$result = mysqli_query($con, "SELECT * FROM articles WHERE id='$id' ") or die('Error');
			while ($row = mysqli_fetch_array($result)) {
				$title = $row['title'];
				$article = $row['article'];
				$date = $row['date'];
				$date = date("d-m-Y", strtotime($date));
				$time = $row['time'];
				$mail = $row['email'];
				$result1 = mysqli_query($con, "SELECT name FROM user WHERE email='$mail' ") or die('Error');
				while ($row = mysqli_fetch_array($result1)) {
					$by = $row['name'];
				}
				echo '<div class="card mb-3">
				<div class="card-header" style="text-align:center; font-size:24px;"><b>' . $title . '</b></div> ';

				echo '<div class="card-body" style="margin-left:10px;margin-right:10px; padding:5px;">
				<h3 class="card-title" style="padding:5px;">&nbsp;<b>DATE: </b>&nbsp;' . $date . '</h3>
				<h3 class="card-title" style="padding:5px;">&nbsp;<b>TIME: </b>&nbsp;' . $time . '</h3>
				<h3 class="card-title" style="padding:5px;">&nbsp;<b>  BY: </b>&nbsp;' . $by .   '</span><br>
				
				<h3 style="padding-left:10px; text-align:justify">' . $article . '</h3> </div></div>' ;
			}
		} ?>
		<!--View Article closed-->		

	</div>
</body>
</html>