<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idguru'])) {
	//ke laman logmasukguru.php untuk log masuk
	header('location:TeacherLogin.php');
	exit();
}
?>
<!-- sambungan pada header.php -->
<?php include 'TeacherHeader.php';?>
<!-- <body> / isi kandungan -->
<br><br>
<div class="b w3-card-4 w3-center w3-animate-opacity w3-pale-green" style="width:50%; margin: 0px auto;">
	<div class="w3-container w3-brown">
		<h2>Tambah Topik</h2>
	</div>	
	<!-- BORANG TAMBAH TOPIK -->
	<form class="w3-panel w3-pale-green" action="" method="post" enctype="multipart/form-data">
		<label>NAME OF TOPIC</label>
		<input class="w3-input w3-border" type="text" name="topik" placeholder="ENTER NAME OF TOPIC">
		<label>AMOUNT OF QUESTION</label>
		<input class="w3-input w3-border" type="number" name="bilsoalan" placeholder="ENTER AMOUNT OF QUESTION">
		<br>
		<button class="w3-btn w3-teal" type="submit" name="tambah">ADD TOPIC</button>
		<hr>
	</form>
	<!-- BORANG TAMBAH TOPIK TAMAT -->
</div>
<!-- PROSES TAMBAH REKOD BARU TOPIK -->
<?php
//jika butang tambah diklik
if (isset($_POST['tambah'])) {
	$idguru = $_SESSION['idguru'];
	$topik = $_POST['topik'];
	$jumsoalan = $_POST['bilsoalan'];
	$id = rand(1000000,9999999);
	
	//tambah rekod baru ke jadual kuiz
	$query = mysqli_query($con, "INSERT INTO kuiz VALUES ('$id', '$topik', '$jumsoalan', '$idguru') ");
	
	//terus ke paparan tambah soalan untuk menambah soalan
	header('location:addQuestion.php?qid='.$id.'&n='.$jumsoalan.'');
}
?>
<!-- PROSES TAMAT -->
<style>
.b {
  font-family: Arial, Helvetica, sans-serif;
}
h2 {
  font-family: Arial, Helvetica, sans-serif;
}
body{
background-repeat: no repeat;
background-attachment: fixed;
background-size: 100% 100%;
background-color: #CCCCCC;}
</style>
<!-- </body> tamat -->
