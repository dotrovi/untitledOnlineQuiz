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
		exit();
		
	} 
	else 
	{
		echo "<script>alert('Login Failed!')</script>";
		exit();
		// ke laman index.php
		header("location:StudentLogin.php");
		exit();
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
		exit();
 	} 
  	else 
  	{
  		// paparan jika gagal log masuk
	  	echo "<script>alert('Login Failed!')</script>";
		exit();
  		// ke laman index.php
  		header("location:TeacherLogin.php");
  		exit();
  	}
}
?>
