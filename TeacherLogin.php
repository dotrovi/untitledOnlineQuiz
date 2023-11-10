<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset= "utf-8">
		<title>QUIZ</title>
  
<!-- sambungan fail css -->
		<link rel="stylesheet" href="css/w3.css">
  
<!-- sambungan ke laman web font google -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">

<!-- membuat css untuk menggunakan font google -->
		<?php include 'RegisterStyles.php' ?>
	</head>
 
	<body>
		<div class="b w3-container w3-center" style="width:50%; margin: 0px auto;">
			<p class="w3-audiowide w3-jumbo w3-animate-opacity">QUIZ</p>
			<div class="w3-border w3-brown w3-animate-zoom">
				<div class="w3-container w3-margin w3-light-green w3-animate-opacity">
					<p> TEACHER PANEL </p>
	 
<!------ BORANG LOG MASUK ------>
					<form action="proseslogin.php?q=2" method="post">
					<input class="w3-input w3-center" type="text" name="username" placeholder="USERNAME [GURU]">
					<input class="w3-input w3-center" type="password" name="pwd" placeholder="PASSWORD">
					<br>
					<button class="w3-btn w3-green" type="submit" name="login">LOG IN</button> | <a href="TeacherRegister.php" class="w3-btn w3-blue" type="submit" name="signup">SIGN IN</a>
					<br><br>
					</form>
<!---- TAMAT BORANG LOG MASUK (JIKA ADA MASALAH, CHECK SINI!) -->
				</div>
			</div>
		</div>
		<br><br><br><br>
		<div class="b w3-center">
			<a href="index.php" class="w3-btn w3-round-xxlarge w3-pale-green w3-animate-zoom" type="submit" name="menu">MAIN SITE</a>
		</div>
	</body>
