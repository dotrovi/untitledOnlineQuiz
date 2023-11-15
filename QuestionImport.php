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
<?php include 'TeacherHeader.php'; ?>

<!-- <body> / isi kandungan -->
<!-- USER INTERFACE -->
<br>
<div class="b w3-card-4 w3-center w3-pale-green w3-animate-opacity" style="width:40%; margin: 0px auto;">
	
	<!-- BORANG MENGIMPORT FAIL CSV -->
	<div class="w3-container w3-brown b"><h3><b>IMPORT TOPIC & QUESTIONS</b></h3></div>
	<form class="w3-panel" action="importsoalan.php" method="post" enctype="multipart/form-data">
		<label class="w3-text-blue"><h5><b>CHOOSE CSV FILE</b></h5></label>
		<input class="w3-input w3-white w3-border" type="file" name="fail">
		<br>
		<button class="w3-btn w3-teal" type="submit" name="import">IMPORT</button>
		<hr>
	</form>
	<!-- TAMAT BORANG -->
</div>
<!-- USER INTERFACE TAMAT -->

<!-- PROSES MENAMBAH REKOD DARI FAIL CSS KE JADUAL DALAM PANGKALAN DATA -->
<?php
//jika butang import diklik
if(isset($_POST['import'])) {
	if($_FILES['fail']['name']) {
		$filename = explode(".", $_FILES['fail']['name']);
		//semak jika fail csv
		if($filename[1] == 'csv') {
			$handle = fopen($_FILES['fail']['tmp_name'], "r");
			fgetcsv($handle);
			while($data = fgetcsv($handle)) {
				// tambah rekod ke jadual kuiz
				$query = mysqli_query($con, "INSERT INTO kuiz VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')");
				// tambah rekod ke jadual soalan
				$query2 = mysqli_query($con, "INSERT INTO soalan VALUES ('$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]')");
			}
			fclose($handle);
			// mesej pop-up jika rekod berjaya masuk jadual
			echo "<script>alert('Question successfully recorded.');</script>";
		}
	}
}
?>
<!-- PROSES TAMAT -->
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
