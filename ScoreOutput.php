<?php
include 'connection.php';
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
<?php include 'phpStyles.php'; ?>

<!-- <body> / isi kandungan -->
<!-- Proses memaparkan senarai kuiz -->
<?php
	//dapatkan idskor utk memaparkan skor berdasarkan nokp
	$nokp = $_GET['id']; 
	$nama = $_GET['nama'];
	
	//mendapatkan data dari jadual skor dan kuiz berdasarkan nokpmurid
	$sql = mysqli_query($con, "SELECT * FROM skor INNER JOIN kuiz ON kuiz.idkuiz = skor.idkuiz WHERE skor.nokpmurid = '$nokp'");
	?>
	<br>
	<center class="textShadow textFormat textFormat w3-animate-opacity">
	<label class="w3-text-blue"><h3><b>SCORE LIST</b></h3></label>
	<label class="w3-text-black"><u><b><?php echo $nama ?></b></u></label>
	</center>
	<br>
	<!-- table untuk senarai skor -->
	<table class="textFormat w3-table w3-centered w3-animate-opacity" border="1" style="width:70%; margin: auto;">
		<tr class="w3-brown">
			<th>QUIZ TOPIC</th>
			<th>PERCENTAGE</th>
			<th>AMOUNT OF CORRECT ANSWER</th>
			<th>AMOUNT OF WRONG ANSWER</th>
			<th>ACTION</th>
		</tr>
		<tr>
			<?php

			
			//jika tidak terdapat data
			if (mysqli_num_rows($sql) == 0) {
				echo '<tr class="w3-pale-green"><td colspan="6">No score data!</td></tr>';
			} else {
				while ($row = mysqli_fetch_array($sql)) {
					$idskor = $row['idskor'];
					$idkuiz = $row['idkuiz'];
					$topik = $row['topik'];
					$markah = $row['markah'];
					$jbetul = $row['betul'];
					$jsalah = $row['salah'];
					
					//paparkan data dari jadual kuiz, skor 
					echo '<tr class="w3-pale-green">
						<td>'.$topik.'</td>
						<td>'.$markah.'%</td>
						<td class="w3-text-green">'.$jbetul.'</td>
						<td class="w3-text-red">'.$jsalah.'</td>
						<td><a href="delete.php?q=3&id='.$idskor.'"><button class="w3-button w3-red"> DELETE </button></a></td>
						<tr>';
				}
			}
?>
</table>
<br>
<br>
<div class="w3-center w3-animate-opacity">
	<a href="senarai.php?q=3"><button class="w3-button w3-hover-cyan w3-centered w3-teal"> KEMBALI </button></a>
</div>
<br>
<br>
