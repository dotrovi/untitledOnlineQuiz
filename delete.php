<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : delete.php -->

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

<!-- PROSES DELETE -->
<?php
//proses memadam rekod bagi kuiz
if($_GET['q']== 1) {
	//mendapatkan idkuiz yang dipilih untuk dipadam
	$idkuiz = $_GET['id'];
	
	//pernyataan sql untuk memadam data daripada jadual kuiz dan soalan
	$padam = mysqli_query($con, "DELETE FROM kuiz WHERE idkuiz = '$idkuiz' ");
	$padam2 = mysqli_query($con, "DELETE FROM soalan WHERE idkuiz = '$idkuiz' ");
	
	//mesej pop up apabila proses memadam berjaya dan dibawa semula ke paparan senarai topik
	echo "<script>alert('QUIZ SUCCESSFLLY REMOVED.');
		window.location='List.php?q=1'</script>";
}

//proses memadam rekod bagi murid
if($_GET['q']==2) {
	//mendapatkan nokpmurid yang dipilih untuk dipadam
	$nokp = $_GET['id'];
	
	//pernyataan sql untuk memadam data drpd jadual murid
	$padam = mysqli_query($con, "DELETE FROM murid WHERE nokpmurid = '$nokp' ");
	
	//mesej pop up apabila proses memadam berjaya dan dibawa semula ke paparan senarai murid
	echo "<script>alert('STUDENT INFORMATION SUCCESSFULLY REMOVED.');
		window.location='List.php?q=3'</script>";
}

//proses memadam rekod bagi skor
if($_GET['q']==3) {
	//mendapatkan idskor yang dipilih untuk dipadam
	$idskor = $_GET['id'];
	
	//pernyataan sql untuk memadam data drpd jadual murid
	$padam = mysqli_query($con, "DELETE FROM skor WHERE idskor = '$idskor' ");
	
	//mesej pop up apabila proses memadam berjaya dan dibawa semula ke paparan senarai murid
	echo "<script>alert('STUDENT SCORE SUCCESSFULLY REMOVED.');
		window.location='List.php?q=3'</script>";
}
?>
