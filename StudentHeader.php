<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title class="textFormat">QUIZ</title>
<!--- sambungan fail css drpd folder css --->
		<link rel="stylesheet" href="css/w3.css">
	</head>

<?php include 'phpStyles.php' ?>
	
	<body>
		<!--- fungsi untuk besarkan saiz tulisan --->
		<div class="textFormat w3-header w3-brown w3-border-bottom">
			<b>&nbsp; &nbsp; Font :</b>
			<button class="w3-button w3-border-right" onclick="resizeText(-1)">A-</button>
			<button class="w3-button w3-border-left" onclick="resizeText(1)">A+</button>
			<script type="text/javascript">
				function resizeText(multiplier) {
					if (document.body.style.fontSize == "") {
						document.body.style.fontSize = "1.0em";
					}
					document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
				}
			</script>

			<!-- fungsi untuk besarkan saiz tulisan tamat -->
			<!-- MENU NAVIGASI BAHARU -->
			<div class="dropdown" style="float:right;">
				<button class="dropbtn b w3-border-left w3-text-black">MENU</button>
					<div class="dropdown-content" style="right:0;">
						<a href="utama.php" class="b w3-bar-item w3-button w3-hover-green w3-border-right">UTAMA</a>
						<a href="pencapaian.php" class="b w3-bar-item w3-button w3-hover-green w3-border-right">LIHAT AKTIVITI</a>
						<a href="senaraimuridguru.php" class="b w3-bar-item w3-button w3-hover-green w3-border-right">MURID & GURU</a>
						<a href="Logout.php" class="b w3-bar-item w3-hover-red w3-button">LOG KELUAR</a>
					</div>
			</div>

			<?php
			// semak jika terdapat murid log masuk
			if (isset($_SESSION['nokpmurid'])) {
				// mendapatkan rekod dari jadual murid
				$nokpmurid = $_SESSION['nokpmurid'];
				$query = mysqli_query($con, "SELECT * FROM murid WHERE nokpmurid = '$nokpmurid'");
				$user = mysqli_fetch_array($query); 
			?>
		
				<!------- paparkan nama murid --->
				<a class="b w3-bar-item w3-button w3-brown w3-hover-brown w3-right">Hai <?php echo $user['nama'];?></a>
				<?php
			} else { 
				?>
				<a href="StudentLogin.php" class="b w3-bar-item w3-button w3-red w3-right">LOG MASUK</a>
			<?php
			}
			?>
		</div>
<!-- menu navigasi tamat -->
    </body>
</html>
