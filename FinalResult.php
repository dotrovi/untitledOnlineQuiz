<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : FinalResult.php -->

<?php
//fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
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
//untuk menyimpan skor murid
if(!isset($_SESSION['skor'])) {
	$_SESSION['skor'] = 0;
}
?>

<?php
//mendapatkan data dari fail mula.php
if(isset($_POST)) {
	$idkuiz = $_GET['id'];
	$idsoalan = $_GET['idsoalan'];
	$jumsoalan = $_GET['jum'];
	$nosoalan = $_GET['n'];
	$userans = $_POST['userans'];
	$nokpmurid = $_SESSION['nokpmurid'];
	
	//mendapatkan rekod dari jadual soalan
	$jawapan = mysqli_query($con, "SELECT * FROM soalan WHERE idsoalan = '$idsoalan' ");
	while ($row = mysqli_fetch_array($jawapan)) {
		//mendapatkan jawapan betul
		$trueans = $row['jawapan'];
	}
	
	//membuat perbandingan jawapan murid dan jawapan sebenar
	if ($userans == $trueans) {
		//setiap jawapan yang betul akan ditambah 1
		$_SESSION['skor']++;
	}
}
?>

<!-- user interface untuk memaparkan keputusan menjawab kuiz -->
<br>
<div class="w3-container">
<br>
	<div class="w3-panel w3-pale-green w3-border w3-round-xlarge" style="width:60%; margin: 10px auto;">
	<br>
	<?php
	//jika soalan masih belum habis
	if($nosoalan != $jumsoalan) {
		$nosoalan++;
		header('location:mula.php?id='.$idkuiz.'&n='.$nosoalan.'&jum='.$jumsoalan.'&skor='.$_SESSION['skor'].' ');
		//jika semua soalan telah dijawab
	} else {
		echo '<center><label class="w3-text-blue"><h3><b>TAHNIAH! ANDA TELAH BERJAYA MENJAWAB KUIZ!<br>LIHAT KEPUTUSAN ANDA.</b></h3></label></center><br>';
		
		//proses pengiraan markah
		$jawapanbetul= $_SESSION['skor'];
		unset($_SESSION['skor']);
		$jawapansalah = $jumsoalan - $jawapanbetul;
		$skor = round(($jawapanbetul / $jumsoalan) * 100);
		
		//masukkan markah murid ke jadual skor
		$insert = mysqli_query($con, "INSERT INTO skor VALUES('', '$nokpmurid', '$idkuiz', '$skor', '$jawapanbetul', '$jawapansalah' ) ");
		
		//mengambil semula rekod markah murid daro jadual skor
		$paparskor = mysqli_query($con, "SELECT * FROM skor WHERE idkuiz = '$idkuiz' AND nokpmurid = '$nokpmurid' ");
		//mengambil data dari jadual skor
		while ($db = mysqli_fetch_array($paparskor)) {
			$markah = $db['markah'];
			$jbetul = $db['betul'];
			$jsalah = $db['salah'];
			
			//memaparkan keputusan murid
			echo '<center><label class="w3-text-green"><h4><b>JAWAPAN BETUL: '.$jbetul.'</b></h4></label></center>
				<center><label class="w3-text-red"><h4><b>JAWAPAN SALAH: '.$jsalah.'</b></h4></label></center>
				<center><label class="w3-text-indigo"><h4><b>MARKAH: '.$markah.'%</b></label></center><br>';
		}
	}
	?>
	<br>
	</div>
</div>
<br><br>
<div class="w3-center">
	<a href="utama.php"><button class="w3-button w3-hover-cyan w3-centered w3-teal"> KEMBALI </button></a>
</div>
<!-- </body> tamat -->

<!-- sambungan pada footer.php -->
<?php include 'footer.php'; ?>
