<?php
include 'connection.php';
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['nokpmurid'])) {
	//ke laman logmasukmurid.php untuk log masuk
	header('location:StudentLogin.php');
}
?>

<!-- sambungan pada header.php -->
<?php include 'StudentHeader.php'; ?>

<!-- <body> / isi kandungan -->
<?php
//mendapatkan data idkuiz, nosoalan dan jumlah soalan dari utama.php
if (isset($_POST)) {
	$idkuiz = $_GET['id'];
	$no = $_GET['n'];
	$jum = $_GET['jum'];
}
?>

<!-- interface untuk memaparkan soalan -->
<br>
<center>
	<label class="w3-text-cyan"><h3><b>GOOD LUCK!</b></h3></label>
</center>
<div class="w3-container">
	<br>
	<div class="w3-pale-green w3-panel w3-border w3-round-xlarge" style="width:60%; margin: 10px auto;">
	<br>
	<?php
	//mendapatkan soalan dari jadual soalan berdasarkan idkuiz dan nosoalan
	$soalan = mysqli_query($con, "SELECT * FROM soalan WHERE idkuiz = '$idkuiz' AND nosoalan = '$no' ");
	while ($row = mysqli_fetch_array($soalan)) {
		$idsoalan = $row['idsoalan'];
		$que = $row['soalan'];
		
		//papar soalan
		echo '<b>Soalan '.$no.' / '.$jum.'<br><br>'.$que.'</b><br>
		<form action="keputusanakhir.php?id='.$idkuiz.'&jum='.$jum.'&idsoalan='.$idsoalan.'&n='.$no.'" method="POST">
			<br>
			<input class="w3-radio" type="radio" name="userans" value="A">' .$row['pilihan1'].'<br>
			<input class="w3-radio" type="radio" name="userans" value="B">' .$row['pilihan2'].'<br>
			<input class="w3-radio" type="radio" name="userans" value="C">' .$row['pilihan3'].'<br>
			<input class="w3-radio" type="radio" name="userans" value="D">' .$row['pilihan4'].'<br>
			<br>
			<button class="w3-button w3-teal" type="submit">SUBMIT</button>
		</form>
		<br>';
	}
	?>
	</div>
</div>
<!-- </body> tamat -->
<!-- sambungan pada footer.php -->
<?php include 'footer.php'; ?>
