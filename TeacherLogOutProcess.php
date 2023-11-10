<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : TeacherLogOutProcess.php -->

<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idguru'])) {
	//ke laman TeacherLogin.php untuk log masuk
	header('location:TeacherLogin.php');
}
?>

<!-- sambungan pada header.php -->
<?php include 'TeacherHeader.php'; ?>

<!-- <body> / isi kandungan -->
<!-- pilihan untuk log keluar atau tidak-->
<br>
<br>
<br>
<div class="b w3-card-4 w3-center w3-pale-green" style="width:25%; margin: 0px auto;">
	<div class="w3-container w3-brown b"><h3><b>Do you want to log out?</b></h3></div>
	<a href="logkeluar.php" class="w3-mobile"><button class="w3-button w3-bar-item w3-button w3-hover-red">Yes</button></a>|<a href="senarai.php?q=1" class="w3-mobile"><button class="w3-button w3-bar-item w3-button w3-hover-green">No</button></a>
</div>

<!-- proses tamat -->
<style>
.a {
	text-shadow: 1px 1px #C5E2EE;
}
.b {
  font-family: Arial, Helvetica, sans-serif;
}
body{
background-repeat: no repeat;
background-attachment: fixed;
background-size: 100% 100%;
background-color: #CCCCCC;}
</style>
<!-- </body> tamat -->
