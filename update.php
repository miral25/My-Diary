<?php
include_once 'dbConnection.php';
session_start();

//starred--
if (@$_GET['sid']) {
	$id = @$_GET['sid'];
	$result = mysqli_query($con, "SELECT star FROM articles WHERE id='$id' ") or die('Error');
	while ($row = mysqli_fetch_array($result)) {
		$star = $row['star'];
		if ($star == 0) {
			$q3 = mysqli_query($con, "UPDATE articles SET star=1 WHERE id='$id' ") or die('Error');
		} else {
			$q3 = mysqli_query($con, "UPDATE articles SET star=0 WHERE id='$id' ") or die('Error');
		}
	}
	header("location:account.php?q1=2");
}

//delete article start
if (@$_GET['did']) {
	$id = @$_GET['did'];
	$result1 = mysqli_query($con, "SELECT * FROM articles WHERE id='$id' ") or die('Error');
	while ($row = mysqli_fetch_array($result1)) {
		$email	 = $row['email'];
		if ($email == $_SESSION['email'] || (isset($_SESSION['key']))) {
			$result = mysqli_query($con, "DELETE FROM articles WHERE id='$id' ") or die('Error');
			header("location:account.php?q1=2");
		} else {
			header("location:invalid.php");
		}
	}
}
?>