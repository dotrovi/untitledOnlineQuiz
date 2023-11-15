<?php
// fail sambungan ke pangkalan data
include 'connection.php';
//mulakan session
session_start();
?>

<?php
//dapatkan data no soalan dam id kuiz dari fail AddQuestion.php
$nom = $_GET['n'];
$id = $_GET['qid'];
?>

<!-- PROSES TAMBAH REKOD BARU SOALAN -->
<?php
//jika butang tambah diklik
//mendapatkan bilangan soalan
for($i=1; $i<=$nom; $i++) {
	$soalan = $_POST['soalan'.$i];
	$pilihan1 = $_POST['pilihan1'.$i];
	$pilihan2 = $_POST['pilihan2'.$i];
	$pilihan3 = $_POST['pilihan3'.$i];
	$pilihan4 = $_POST['pilihan4'.$i];
	$ans = $_POST['ans'.$i];
	
	// tambah rekod baru ke jadual soalan
	$query = mysqli_query($con, "INSERT INTO soalan VALUES ('', '$id', '$i', '$soalan', '$pilihan1', '$pilihan2', '$pilihan3', '$pilihan4', '$ans') ");
	
	// mesej pop-up berjaya ditambah dan akan dibawa ke paparan senarai topik kuiz
	echo "<script>alert('QUESTION SUCCEFULLY ADDED. ')
		window.location = 'List.php?q=1'</script>";
}
?>
<!-- PROSES TAMAT -->
</body>
</html>
