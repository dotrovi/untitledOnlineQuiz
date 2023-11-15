<style>
.a {
	text-shadow: 1px 1px #ABABAB;
}
.b {
  font-family: Arial, Helvetica, sans-serif;
}
body{
background-repeat: no repeat;
background-attachment: fixed;
background-size: 100% 100%;
background-color: #CCCCCC;}
}
</style>
<?php
//fail sambungan kpd pangkalan data
include 'connection.php';
// mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idguru'])) {
	// ke laman logmasukguru.php untuk log masuk
	header('location:TeacherLogin.php');	
	exit();
}
?>

<!-- sambungan kpd header.php -->
<?php include 'TeacherHeader.php'; ?>

<?php
//dapatkan idsoalan dri senarai soalan
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	//mendapatkan soalan dari jadual soalan berdasarkan idsoalan
	$query = mysqli_query($con, "SELECT * FROM soalan WHERE idsoalan = '$id' ");
	$row = mysqli_fetch_array($query);
}
?>

<!-- <body> / isi kandungan -->
<!-- user interface -->
<br>
<div class="b w3-card-4 w3-pale-green" style="width:65%; margin: 0px auto;">
	<h2><center class="w3-bar w3-brown a">QUESTION UPDATE</center></h2>
	<hr>
	<!-- borang kemaskini soalan -->
	<form class="w3-container" action="" method="POST">
		<label class="w3-text-blue"><b>Question number&nbsp;<?php echo $row['nosoalan']?>:</b></label><br>
		<input type="hidden" name="upid" value="<?php echo $row['idsoalan'] ?>">
		<input class="w3-input w3-border" type="text" name="upsoalan" value="<?php echo $row['soalan'] ?>">
		<br>
		<input class="w3-input w3-border" type="text" name="uppilihan1" value="<?php echo $row['pilihan1'] ?>">
		<input class="w3-input w3-border" type="text" name="uppilihan2" value="<?php echo $row['pilihan2'] ?>">
		<input class="w3-input w3-border" type="text" name="uppilihan3" value="<?php echo $row['pilihan3'] ?>">
		<input class="w3-input w3-border" type="text" name="uppilihan4" value="<?php echo $row['pilihan4'] ?>">
		<br>
		<label class="w3-text-blue">Answer Correct</label>
		<select class="w3-select" name="upans" value="<?php echo $row['jawapan'] ?>">
			<option><?php echo $row['jawapan'] ?></option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select>
		<br>
		<hr>
		<button class="w3-btn w3-teal" type="submit" name="kemaskini">UPDATE</button>
	</form>
	<!-- BORANG TAMBAH SOALAN TAMAT -->
	<br>
</div>
<br>
<br>

<!-- PROSES KEMASKINI REKOD -->
<?php
// jika butang kemaskini diklik
if (isset($_POST['kemaskini'])) {
	//tetapkan nama pembolehubah
	$upid = $_POST['upid'];
	$upsoalan = $_POST['upsoalan'];
	$uppilihan1 = $_POST['uppilihan1'];
	$uppilihan2 = $_POST['uppilihan2'];
	$uppilihan3 = $_POST['uppilihan3'];
	$uppilihan4 = $_POST['uppilihan4'];
	$upans = $_POST['upans'];
	
	//kemaskini rekod dalam jadual soalan
	$update = mysqli_query($con, "UPDATE soalan SET soalan = '$upsoalan', pilihan1= '$uppilihan1', pilihan2= '$uppilihan2', pilihan3= '$uppilihan3', pilihan4= '$uppilihan4', jawapan= '$upans' WHERE idsoalan= '$upid' ");
	
	//paparan rekod berjaya dikemaskini
	echo "<script>alert('QUESTION INFORMATION SUCCESSFULLY UPDATED.')
		window.location = 'List.php?q=1'</script>";
}
?>
<!-- PROSES TAMAT -->
<!--  </body> tamat -->
