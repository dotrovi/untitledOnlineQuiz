<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : StudentTeacherList.php -->

<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['nokpmurid'])) {
	//ke laman StudentLogin.php untuk log masuk
	header('location:StudentLogin.php');
}
?>

<!-- sambungan pada StudentHeader.php -->
<?php include 'StudentHeader.php'; ?>

<!-- <body> / isi kandungan -->
<!-- Proses memaparkan senarai guru  -->
	<br>
	<center class="w3-animate-opacity">
		<label class="w3-text-cyan"><h3><b>TEACHER LIST</b></h3></label>
	</center>
	<br>
	
	<!-- buat table untuk senarai guru -->
	<table class="b w3-brown w3-table w3-border w3-centered w3-animate-opacity" border="1" style="width:40%; margin: auto;">
		<tr>
			<th>BIL</th>
			<th>NAME</th>
		</tr>
		<?php
		//mendapatkan data dari jadual guru
		$sql = mysqli_query($con, "SELECT * FROM guru");
		
		//jika tidak terdapat data
		if (mysqli_num_rows($sql) == 0) {
			echo '<tr><td colspan="5" class="w3-pale-green">No teacher in database!</td></tr>';
		} else {
			$no = 1;
			while ($row = mysqli_fetch_array($sql)) {
				$nama = $row['namaguru'];
				
				//paparkan data dari jadual guru
				echo '<tr class="w3-pale-green">
					<td>'.$no++.'</td>
					<td>'.$nama.'</a></td>
					<tr>';
			}
		}
	echo '</table>';
?>
<!-- Proses memaparkan senarai murid  -->
	<br>
	<br>
	<center class="w3-animate-opacity">
		<label class="w3-text-cyan"><h3><b>STUDENT LIST</b></h3></label>
	</center>
	<br>
	
	<!-- buat table untuk senarai murid -->
	<table class="b w3-brown w3-table w3-border w3-centered w3-animate-opacity" border="1" style="width:70%; margin: auto;">
		<tr>
			<th>BIL</th>
			<th>NAME</th>
			<th>CLASS</th>
		</tr>
		<?php
		//mendapatkan data dari jadual murid
		$sql = mysqli_query($con, "SELECT * FROM murid");
		
		//jika tidak terdapat data
		if (mysqli_num_rows($sql) == 0) {
			echo '<tr><td colspan="5" class="w3-pale-green">No student in database!</td></tr>';
		} else {
			$no = 1;
			while ($row = mysqli_fetch_array($sql)) {
				$nama = $row['nama'];
				$kelas = $row['kelas'];
				
				//paparkan data dari jadual murid
				echo '<tr class="w3-pale-green">
					<td>'.$no++.'</td>
					<td>'.$nama.'</a></td>
					<td>'.$kelas.'</td>
					<tr>';
			}
		}
	echo '</table>';
?>
<!-- </body> tamat -->
<style>
h3 {
	text-shadow: 1px 1px #1000B5;
}
.b {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
<!-- sambungan pada footer.php -->
<?php include 'footer.php'; ?>
