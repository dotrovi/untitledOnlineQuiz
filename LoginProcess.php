<?php
include 'connection.php';
session_start();

// login process
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
		header("location:StudentLogin.php");
	}
}
?>