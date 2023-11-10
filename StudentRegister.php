<?php
include 'connection.php';

$error = false;

if(isset($_POST['daftar'])) {
    $nokp = $_POST['nokp'];
	
	  $nama = $_POST['nama'];
	  $username = $_POST['username'];
	  $kelas = $_POST['kelas'];
	  $pwd = $_POST['pwd'];
	
	  // if name has symbols / numbers
  	if (!preg_match("/^[a-zA-Z ]+$/",$nama)) {
		$error = true;
		$nama_error = "Names should have letters and empty space only.";
	}
	
	// if username has symbols / numbers
	if (!preg_match("/^[a-zA-Z]+$/",$username)) {
		$error = true;
		$username_error = "Usernames should have letters and empty space only.";
	}
	
	// if ic number is less than 12
	if(strlen($nokp) < 12) {
		$error = true;
		$nokp_error = "Please enter a valid ic number.";
	}
	
	// if ic number has dashes or more than 12
	if(strlen($nokp) > 12) {
		$error = true;
		$nokp_error = "Please enter a valid ic number without '-'.";
	}
	
	// password less than 6
	if(strlen($pwd) < 6) {
		$error = true;
		$pwd_error = "Your password is too short.";
	}
	
	// password more than 12
	if (strlen($pwd) > 12) {
		$error = true;
		$pwd_error = "Your password is too long.";
	}
	
	// Add new record to database
	if(!$error) {
		if (mysqli_query($con, "INSERT INTO murid VALUES ('$nokp', '$username', '$nama', '$kelas', '$pwd')")) {
			
			// if they succeed
			echo "<script>alert('Register SUCCESSFUL! Please log in here.');</script>";
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
  
<!-- file css, font, background-->
		<link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <?php include 'RegisterStyles.php' ?>
	</head>
	
	<body>
		<div class="b w3-center" style="width:55%; margin: 0px auto;">
			<p class="w3-jumbo w3-audiowide">QUIZ</p>
			<div class="w3-border w3-brown w3-animate-zoom">
				<div class="w3-container w3-margin w3-light-green w3-animate-opacity">
					<p>Register Student</p>
	 
					<!------- BORANG PENDAFTARAN MURID BARU -->
					<form action="StudentRegister.php" method="post">
						<input class="w3-input w3-center" type="text" name="nama" required placeholder="FULL NAME" value="<?php if($error) echo $nama; ?>">
						<span style="color:red"><?php if(isset($nama_error)) echo $nama_error; ?></span>

            <!-- DO CHANGE IC TO MATRIC NUMBER LATER OK? -->
						<input class="w3-input w3-center" type="number" name="nokp" required placeholder="STUDENT IC (SUBJECT TO CHANGE)" value="<?php if($error) echo $nokp; ?>">
						<span style="color:red"><?php if (isset($nokp_error)) echo $nokp_error; ?></span>
	  
						<input class="w3-input w3-center" type="text" name="username" required placeholder="USERNAME" value="<?php if($error) echo $username; ?>">
						<span style="color:red"><?php if (isset($username_error)) echo $username_error; ?></span>

            <!-- change class to something else? maybe course? -->
						<input class="w3-input w3-center" type="text" name="CLASS" required placeholder="CLASS (SUBJECT TO CHANGE)">
						<span style="color:red"><?php if (isset($kelas_error)) echo $kelas_error; ?></span>

            
						<input class="w3-input w3-center" type="password" name="pwd" required placeholder="PASSWORD (6 - 12 letters)" value="<?php if($error) echo $pwd; ?>">
						<span style="color:red"><?php if (isset($pwd_error)) echo $pwd_error; ?></span>
	  
						<br>
						<button class="w3-btn w3-blue" type="submit" name="daftar">REGISTER</button>
						<hr>
						<h6><a class="w3-btn w3-green" href="logmasukmurid.php">LOGIN HERE</a></h6>
					</form>
				
				<!--------- TAMAT BORANG PENDAFTARAN -->
				</div>
			</div>
		</div>
		<br>
		<div class="b w3-center">
			<a href="index.php" class="w3-btn w3-round-xxlarge w3-pale-green" type="submit" name="menu">MAIN SITE</a>
		</div>
	</body>
</html>
