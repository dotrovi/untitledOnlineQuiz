<?php
include 'connection.php';
session_start();

// login process student
if($_GET['q'] == 1)
{
  
	// variables on input
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	
	// find data in database
	$query = mysqli_query($con, "SELECT * FROM murid WHERE namapengguna = '$username' AND katalaluan = '$pwd'");
  
	if($user = mysqli_fetch_array($query)) 
	{
		// nokpmurid as session token
		$_SESSION['nokpmurid'] = $user['nokpmurid'];
		// to main page for students
		header("Location:main.php");
		
	} 
	else 
	{
		// ke laman index.php
		header("refresh:0.5;url=StudentLogin.php");
		echo "<script>alert('Login Failed!')</script>";
	}
}

// login process teacher
if ($_GET['q'] == 2) 
{

 	// variables on input
 	$username = $_POST['username'];
  	$katalaluan = $_POST['pwd'];
  
  	// find data in database
  	$query = mysqli_query($con, "SELECT * FROM guru WHERE namapengguna = '$username' AND katalaluan = '$katalaluan'");
	
  	if ($user = mysqli_fetch_array($query)) 
  	{	
	  
  		// idguru as session token
  		$_SESSION['idguru'] = $user['idguru'];
  		// to main page for teachers
  		header("Location:List.php?q=1");
 	} 
  	else 
  	{
  		// ke laman index.php
  		header("refresh:0.5;url=TeacherLogin.php");
		echo "<script>alert('Login Failed!')</script>";
  	}
}
?>
