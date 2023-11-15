<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['nokpmurid'])) {
	//ke laman logmasukmurid.php untuk log masuk
	header('location:StudentLogin.php');
	exit();
}
?>

<!-- sambungan pada header.php -->
<?php include 'StudentHeader.php'; ?>

<!-- <body> / isi kandungan -->
<br>
<div class="w3-container w3-center w3-animate-opacity">
	
	<label class="w3-text-cyan w3-text-outline"><h2 class="b"><b>UJI PENGETAHUAN ANDA</h2><h6 class="b">BAGI SUBJEK</h6><h3 class="b">SAINS TINGKATAN 2</h3></b></label>
	<br><br>
	<!-- TABLE MEMAPARKAN SENARAI KUIZ -->
	<table class="b w3-table w3-border w3-centered w3-brown" border="1" style="width:70%; margin: auto;">
	<tr>
		<th>BIL</th>
		<th>TOPIK</th>
		<th>JUMLAH SOALAN</th>
		<th>TINDAKAN</th>
	</tr>
	<tr>
		<?php
		//mendapatkan data dari jadual kuiz
		$sql = mysqli_query($con, "SELECT * FROM kuiz");
		//jika tidak terdapat data
		if (mysqli_num_rows($sql) == 0) {
			echo '<tr><td colspan="5" class="w3-pale-green">TIADA KUIZ UNTUK ANDA!</td></tr>';
		} else {
			$no = 1;
			while ($row = mysqli_fetch_array($sql)) {
				$topik = $row['topik'];
				$jumsoalan = $row['jumsoalan'];
				$idkuiz = $row['idkuiz'];
				$nokpmurid = $_SESSION['nokpmurid'];
				
			// semak jika murid sudah menjawab kuiz atau tidak
				$query = mysqli_query($con, "SELECT markah FROM skor WHERE idkuiz = '$idkuiz' AND nokpmurid = '$nokpmurid' ");
				$baris = mysqli_num_rows($query);
				
			// paparan jika murid belum menjawab kuiz
				if ($baris == 0) {
					echo '<tr class="w3-pale-green">
					<td>'.$no++.'</td>
					<td>'.$topik.'</td>
					<td>'.$jumsoalan.'</td>
					<td><a href="mula.php?id='.$idkuiz.'&n=1&jum='.$jumsoalan.'"><button class="w3-button w3-green"> MULA </button></a></td>
					<tr>';
				}
				
			// paparan jika murid sudah menjawab kuiz
				else {
					echo '<tr style="color:#006400" class="w3-pale-green">
					<td>'.$no++.'</td>
					<td>'.$topik.'</td>
					<td>'.$jumsoalan.'</td>
					<td><button class="w3-button w3-orange" disabled> LIHAT AKTIVITI </button></td>
					<tr>';
				}
			}
		}
		?>
		</tr>
	</table>
<!-- TAMAT TABLE -->

</div>
<style>
h2 {
	text-shadow: 1px 1px #1000B5;
}
h6 {
	text-shadow: 1px 1px #1000B5;
}
h3 {
	text-shadow: 1px 1px #1000B5;
}
.b {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
<!-- </body> tamat -->
<!-- sambungan pada footer.php -->
<?php include 'footer.php'; ?>
