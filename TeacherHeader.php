<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : headerguru.php -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title class="b">PANEL GURU</title>
 <!---- sambungan fail css ---->
		<link rel="stylesheet" href="css/w3.css">
	</head>

	<body>
<!--- fungsi untuk besarkan saiz tulisan --->
		<div class="b w3-header w3-brown w3-border-bottom">
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
					<a href="senarai.php?q=1" class="w3-bar-item w3-button w3-hover-green w3-border-right">MAIN</a>
					<a href="tambahtopik.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">ADD</a>
					<a href="importsoalan.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">IMPORT</a>
					<a href="senarai.php?q=3"class="w3-bar-item w3-button w3-hover-green w3-border-right">STUDENT</a>
					<a href="senaraiguru.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">TEACHER</a>
					<a href="carianrekod.php" class="w3-bar-item w3-button w3-hover-green w3-border-right">REPORT</a>		
					<a href="proseslogkeluarguru.php" class="w3-bar-item w3-button w3-hover-red">LOG OUT</a>
				</div>
			</div>
			
<?php
// semak jika terdapat guru log masuk
if (isset($_SESSION['idguru'])) {
// mendapatkan rekod dari jadual guru
$idguru = $_SESSION['idguru'];
$query = mysqli_query($con, "SELECT * FROM guru WHERE idguru = '$idguru'");
$user = mysqli_fetch_array($query); 
?>	
<!------- paparkan nama guru --->
<a class="w3-bar-item w3-button w3-brown w3-hover-brown w3-right">Welcome, <?php echo $user['namaguru'];?></a>
<?php
} else { 
?>
<a href="logmasukguru.php" class="w3-bar-item w3-button w3-red w3-right">LOG MASUK</a>
<?php
}
?>
		</div>
	</body>
<!-- menu navigasi tamat -->
</html>
<style>
.dropbtn{
background-color: #CDAF9A;
color: white;
padding: 8.1px;
font-size:;
border: none;
}
.dropdown{
position: relative;
display: inline-block;
}
.dropdown-content{
display: none;
position: absolute;
background-color: #f1f1f1;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}
.dropdown-content a{
color: black;
padding: 12px 16px;
text-decoration: none;
display: block; 
}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #168113;}
.b {font-family: Arial, Helvetica, sans-serif;}
</style>
