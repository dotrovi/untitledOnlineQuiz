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
<!-- user interface memaparkan senarai markah semua kuiz yang telah dijawab -->
<br>
<center class="w3-animate-opacity"><label class="w3-text-cyan"><h3 class="b"><b>YOUR ACHIEVEMENT</b></h3></label></center>
<div class="w3-container w3-animate-opacity">
	<div class="b w3-panel w3-border" style="width:80%; margin: 10px auto;">
		<?php
		//mendapatkan data nokp murid
		$nokpmurid = $_SESSION['nokpmurid'];
	
		//mendapatkan maklumat murid dari jadual murid berdasarkan murid yang log masuk sistem
		$murid = mysqli_query($con, "SELECT * FROM murid WHERE nokpmurid = '$nokpmurid' ");
	
		//papar nama dan nokp murid
		while ($data = mysqli_fetch_array($murid)) {
			echo '<b><u><center class="b">'.$data['nama'].' | '.$data['nokpmurid'].'</center></u></b><br><br>';
		}
	
		echo '<table class="b w3-brown w3-table w3-border w3-centered" border="1" style="width:70%; margin: auto;">
		<tr>
			<th>TOPIC</th>
			<th>AMOUNT OF QUESTION</th>
			<th>MARKS/th>
			<th>AMOUNT OF CORRECT ANSWER</th>
			<th>AMOUNT OF WRONG ANSWER</th>
		</tr>';
	
		//mendapatkan rekod pencapaian pelajar (gabungan 3 jadual)
		$pencapaian = mysqli_query($con, "SELECT skor.*, kuiz.* FROM skor INNER JOIN kuiz WHERE skor.idkuiz = kuiz.idkuiz AND skor.nokpmurid = '$nokpmurid' ");
		//jika tiada sebarang rekod dijumpai
			if (mysqli_num_rows($pencapaian) == 0) {
				echo '<tr><td colspan = "5" class="w3-pale-green">NO RECORD FOUND.</td></tr>';
			} else {
				while ($papar = mysqli_fetch_array($pencapaian)) {
					$topik = $papar['topik'];
					$jsoalan = $papar['jumsoalan'];
					$markah = $papar['markah'];
					$jbetul = $papar['betul'];
					$jsalah = $papar['salah'];
		
					//papar rekod pencapaian murid
					echo '<tr class="w3-pale-green">
						<td>'.$topik.'</td>
						<td>'.$jsoalan.'</td>
						<td>'.$markah.'%</td>
						<td class="w3-text-green">'.$jbetul.'</td>
						<td class="w3-text-red">'.$jsalah.'</td>
					</tr>';
				}
			}
		echo '</table>';
		?>
		<br>
		<br>
	</div>
</div>
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
