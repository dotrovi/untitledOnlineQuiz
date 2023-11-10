<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : List.php -->
<head>
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
</head>

<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();

//sekatan pengguna - jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idguru'])) {
	//ke laman logmasukguru.php untuk log masuk
	header('location:TeacherLogin.php');
}
?>

<!-- sambungan pada header.php -->
<?php include 'TeacherHeader.php'; ?>

<!-- <body> / isi kandungan -->
<!-- Proses memaparkan senarai kuiz -->
<?php
if($_GET['q'] == 1) { ?>
	<br>
	<center class="a b w3-animate-opacity">
		<label class="w3-text-blue"><h3><b>QUIZ TOPIC LIST</b></h3></label>
		<label class="w3-text-blue">Please click on TITLE for question viewing.</label>
	</center>
	<br>
  
	<!-- buat table untuk memaparkan senarai topik dalam jadual kuiz -->
	<table class="b w3-table-all w3-border w3-centered w3-animate-opacity" border="1" style="width:70%; margin: auto;">
		<tr class="w3-brown">
			<th>BIL</th>
			<th>TTITLE</th>
			<th>TOTAL OF QUESTIONS</th>
			<th>ACTION</th>
		</tr>
	<tr>
		<?php
		//mendapatkan data dari jadual kuiz
		$sql = mysqli_query($con, "SELECT * FROM kuiz");
		// jika tidak terdapat data	
		if (mysqli_num_rows($sql) == 0) {
			echo '<tr class="w3-pale-green"><td colspan="5">DOES NOT CONTAIN QUIZ!</td></tr>';
		} else {
			$no = 1;
			while($row = mysqli_fetch_array($sql)) {
				$idkuiz = $row['idkuiz'];
				$topik = $row['topik'];
				$jumsoalan = $row['jumsoalan'];
			
				//paparkan data dari jadual kuiz
				echo '<tr class="w3-pale-green">
					<td>'.$no++.'</td>
					<td><a href="List.php?q=2&id='.$idkuiz.'">'.$topik.'</a></td>
					<td>'.$jumsoalan.'</td>
					<td><a href="delete.php?q=1&id='.$idkuiz.'"><button class="w3-button w3-red"> DELETE </button></a></td>
					<tr>';
				
			}
		}
}
?>


<!-- PROSES MEMAPARKAN SENARAI SOALAN -->
<?php
if($_GET['q'] == 2) {
	//dapatkan idkuiz utk papar soalan berdasarkan idkuiz
	$idkuiz = $_GET['id']; ?>
	
	<br>
	<center class="w3-animate-opacity">
		<label class="a b w3-text-blue"><h3><b>QUESTION LIST</b></h3></label>
	</center>
	<br>
	
	<!-- tabel untuk senarai soalan -->
	<table class="b w3-table w3-centered w3-animate-opacity" border="1" style="width:70%; margin: auto;">
		<tr class="w3-brown">
			<th>NO QUESTION</th>
			<th>QUESTION</th></th>
			<th>ACTION</th>
		</tr>
		<tr>
			<?php
			//mendapatkan data dari jadual soalan berdasarkan idkuiz
			$sql = mysqli_query($con, "SELECT * FROM soalan WHERE idkuiz = '$idkuiz'");
			
			//jika tidak terdapat data
			if (mysqli_num_rows($sql) == 0) {
				echo '<tr class="w3-pale-green"><td colspan="3">DOES NOT CONTAIN QUESTION!</td></tr>';
			} else {
				while ($row = mysqli_fetch_array($sql)) {
					$idkuiz = $row['idkuiz'];
					$idsoalan = $row['idsoalan'];
					$nosoalan = $row['nosoalan'];
					$soalan = $row['soalan'];
					
					//paparkan data dari jadual soalan
					echo '<tr class="w3-pale-green">
						<td>'.$nosoalan.'</td>
						<td>'.$soalan.'</td>
						<td><a href="kemaskini.php?id='.$idsoalan.'"><button class="w3-button w3-green"> REFRESH </button></a></td>
						<tr>';
				}
			}
	echo '</table><br><br><div class="w3-center"><a href="senarai.php?q=1"><button class="w3-button w3-hover-cyan w3-centered w3-teal"> KEMBALI </button></a></div><br><br>';
}
?>


<!-- Proses memaparkan senarai murid  -->
<?php if($_GET['q'] == 3) { ?>
	<br>
	<center class="w3-animate-opacity">
		<label class="a b w3-text-blue"><h3><b>STUDEHT LIST</b></h3></label>
		<label class="w3-text-blue">Remove score data before removing student data.</label>
	</center>
	<br>
	
	<!-- buat table untuk senarai murid -->
	<table class="b w3-table w3-border w3-centered w3-animate-opacity" border="1" style="width:70%; margin: auto;">
		<tr class="w3-brown">
			<th>BIL</th>
			<th>NAME</th>
			<th>NO IC</th>
			<th>CLASS</th>
			<th>QUIZ SCORE</th>
			<th>ACTION</th>
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
				$nokp = $row['nokpmurid'];
				$nama = $row['nama'];
				$kelas = $row['kelas'];
				
				//paparkan data dari jadual murid
				echo '<tr class="w3-pale-green">
					<td>'.$no++.'</td>
					<td>'.$nama.'</a></td>
					<td>'.$nokp.'</td>
					<td>'.$kelas.'</td>
					<td><a href="paparskor.php?id='.$nokp.'&nama='.$nama.'"><button class="w3-button w3-green"> VIEW </button></a></td>
					<td><a href="delete.php?q=2&id='.$nokp.'"><button class="w3-button w3-red"> DELETE </button></a></td>
					<tr>';
			}
		}
	echo '</table><br><br>';
}
?>
<!-- </body> tamat -->
