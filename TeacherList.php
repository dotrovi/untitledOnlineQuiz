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
<!-- Proses memaparkan senarai guru  -->
	<br>
	<center class="w3-animate-opacity">
		<label class="a b w3-text-blue"><h3><b>TEACHER LIST</b></h3></label>
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
