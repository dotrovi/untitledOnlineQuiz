<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset = "utf-8">
    <title class="textFormat">TEACHER PANEL</title>
    <link rel = "stylesheet" href="css/w3.css">
    <?php include 'phpStyles.php' ?>
  </head>

  <body>
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
				<button class="dropbtn w3-border-left w3-text-black">MENU</font></button>
				<div class="dropdown-content" style="right:0;">
					<a href="List.php?q=1" class="w3-bar-item w3-button w3-hover-green w3-border-right">MAIN</a>
					<a href="addTopic.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">ADD</a>
					<a href="QuestionImport.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">IMPORT</a>
					<a href="List.php?q=3"class="w3-bar-item w3-button w3-hover-green w3-border-right">STUDENT</a>
					<a href="TeacherList.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">TEACHER</a>
					<a href="FindRecord.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">REPORT</a>		
					<a href="TeacherLogOutProcess.php" class="w3-bar-item w3-button w3-hover-red">LOG OUT</a>
				</div>
			</div>
			
      			<?php
      				// semak jika terdapat guru log masuk
				if (isset($_SESSION['idguru'])) 
				{
	        			// mendapatkan rekod dari jadual guru
        				$idguru = $_SESSION['idguru'];
        				$query = mysqli_query($con, "SELECT * FROM guru WHERE idguru = '$idguru'");
        				$user = mysqli_fetch_array($query); 
      			?>	
      					<!------- paparkan nama guru --->
        				<a class="w3-bar-item w3-button w3-brown w3-hover-brown w3-right">Welcome, <?php echo $user['namaguru'];?></a>
      					<?php
      				}
				else 
				{ 
      					?>
		        		<a href="logmasukguru.php" class="w3-bar-item w3-button w3-red w3-right">LOG MASUK</a>
      					<?php
      				}
      					?>
	</div>
  </body>
</html>
