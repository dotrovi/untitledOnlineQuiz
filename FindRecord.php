<!-- SISTEM APLIKASI KUIZ SAINS -->
<!-- DISEDIAKAN OLEH :- ivorbarriejaffery@smkmatunggong -->
<!-- FILE : FindRecord.php -->

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
<!-- USER INTERFACE -->
<br>
<div class="b w3-card w3-center w3-animate-opacity" style="width:50%; margin: 0px auto;">
	<div class="w3-brown w3-container b"><h3><b>STUDENT PERFORMANCE RECORD</b></h3></div>
	<div class="w3-border w3-pale-green">
		<!-- BORANG CARIAN REKOD PRESTASI MURID BERDASARKAN TOPIK KUIZ -->
		<?php
		//mendapatkan data dalam jadual kuiz
		$search = mysqli_query($con, "SELECT * FROM kuiz");
		?>
	
		<!-- menetapkan 'form' carian -->
		<form action="report.php" method="post" enctype="multipart/form-data">
			<br>
			<br>
			<div class="w3-container">
				<!-- menetapkan pilihan berdasarkan topik yang terdapat dalam pangkalan data -->
				<select class="w3-select w3-border" name="search">
				<option> -- CHOOSE TOPIC -- </option>
				<?php
					while ($s = mysqli_fetch_array($search)) {
						$id = $s['idkuiz'];
						$topik = $s['topik'];
					
						echo '<option value=" '.$id.' ">'.$topik.'</option>';
					}
					?>
				
				</select>
				<br>
				<br>
			
				<!-- butang untuk carian -->
				<input class="w3-button w3-teal" type="submit" name="cari" value="JANA LAPORAN">
			</div>
			<br>
		</form>
		<!-- TAMAT BORANG CARIAN -->
	</div>
</div>
<!-- TAMAT USER INTERFACE -->					
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
