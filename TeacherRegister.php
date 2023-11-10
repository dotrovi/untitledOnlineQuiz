<?php
include 'connection.php';
$error = false;

if(isset($_POST['daftar'])) {
	// Data classified as variables
	$namaguru = $_POST['namaguru'];
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	
	// if name has numbers or symbols
	if (!preg_match("/^[a-zA-Z ]+$/",$namaguru)) {
		$error = true;
		$namaguru_error = "MUST CONTAIN LETTER AND SPACE";
	}
	
	// if username has numbers of symbols
	if (!preg_match("/^[a-zA-Z]+$/",$username)) {
		$error = true;
		$username_error = "MUST CONTAIN LETTER ONLY";
	}
	
	// if password less than 6 letters
	if (strlen($pwd) < 6) {
		$error = true;
		$pwd_error = "Password is minimum 6 letters";
	}
	
	// if password more than 12 letters
	if (strlen($pwd) > 12) {
		$error = true;
		$pwd_error = "Password is maximum 12 letters";
	}
	
	// new data to table guru (SUBJECT TO CHANGE)
	if (!$error) {
		if (mysqli_query($con, "INSERT INTO guru VALUES ('', '$namaguru', '$username', '$pwd')")) {
			
			// if successful
			echo "<script>alert('Register SUCCESSFUL! Please log in here.');</script>";
		} else {
			
			// if unsuccessful
			echo "<script>alert('ERROR! Please register again.');</script>";
		}
	}
}
?>


<!-- USER INTERFACE -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>QUIZ</title>
  
<!----- sambungan fail css & font -->
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
		<?php include 'RegisterStyles.php' ?>
	</head>
	
	<body>
	<div class="b w3-center" style="width:55%; margin: 0px auto;">
		<p class= "w3-jumbo w3-audiowide">SCIENCE QUIZ T2</p>
		<div class="w3-border w3-brown w3-animate-zoom">
		<div class="w3-container w3-margin w3-light-green w3-animate-opacity">
			<p>TEACHER REGISTER</p>
	 
<!------- BORANG PENDAFTARAN GURU BARU ----------->
			<form action="TeacherRegister.php" method="post">
				<input class="w3-input w3-center" type="text" name="namaguru" required placeholder="FULL NAME" value="<?php if($error) echo $namaguru;?>">
				<span style="color:red"><?php if(isset($namaguru_error)) echo $namaguru_error;?></span>
	  
				<input class="w3-input w3-center" type="text" name="username" required placeholder="USERNAME" value="<?php if($error) echo $username;?>">
				<span style="color:red"><?php if(isset($username_error)) echo $username_error;?></span>
	  
				<input class="w3-input w3-center" type="password" name="pwd" required placeholder="PASSWORD" value="<?php if($error) echo $pwd;?>">
				<span style="color:red"><?php if(isset($pwd_error)) echo $pwd_error;?></span>
	  
				<br>
				<button class="w3-btn w3-blue" type="submit" name="daftar">SIGN IN</button>
	  
				<hr>
				<h6><a class="w3-btn w3-green" href="TeacherLogin.php">LOG IN HERE</a></h6>
			</form>
		</div>
	</div>
	</div>
	<br>
		<div class="b w3-center">
			<a href="index.php" class="w3-btn w3-round-xxlarge w3-pale-green" type="submit" name="menu">MAIN SITE</a>
		</div>
	</body>
</html>
