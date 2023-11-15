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
<!-- dapatkan data jumlah soalan dan idkuiz dari tambahtopik.php -->
<?php
$no = $_GET['n'];
$idkuiz = $_GET['qid'];
?>


<!-- USER INTERFACE -->
<br>
<br>
<div class="b w3-card-4 w3-pale-green" style="width:55%; margin: 0px auto;">
	<div class="w3-brown w3-bar"><h3><center>ADD QUESTION</center></h3></div>
	<hr>
	
	<!-- BORANG TAMBAH SOALAN -->
	<?php
	echo '<form class="w3-container" action="prosestambahsoalan.php?n='.$no.'&qid='.$idkuiz.'" method="post" enctype="multipart/form-data">';
	// tetapkan no soalan sebagai i dan bermula dengan nombor 1 
	for($i=1;  $i<=$no; $i++) {
		echo '<label class="w3-text-blue"><b>Soalan nombor&nbsp;'.$i.':</b></label><br>
		<input class="w3-input w3-border" type="text" name="soalan'.$i.'" placeholder="MASUKKAN SOALAN NOMBOR ' .$i. '">
		<br>
		<input class="w3-input w3-border" type="text" name="pilihan1'.$i.'" placeholder="ADD ANSWER OPTION FOR OPTION A">
		<input class="w3-input w3-border" type="text" name="pilihan2'.$i.'" placeholder="ADD ANSWER OPTION FOR OPTION B">
		<input class="w3-input w3-border" type="text" name="pilihan3'.$i.'" placeholder="ADD ANSWER OPTION FOR OPTION C">
		<input class="w3-input w3-border" type="text" name="pilihan4'.$i.'" placeholder="ADD ANSWER OPTION FOR OPTION D">
		<br>
		<label class="w3-text-blue">ANSWER CORRECT</label>
		<select class="w3-select" name="ans'.$i.'" placeholder="Choose the right answer">
			<option>CHOOSE ANSWER FOR QUESTION '.$i.'</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
		</select>
		<br>
		<hr class="w3-brown">';
		} ?>
		<button class="w3-btn w3-teal" type="submit">ADD QUESTION</button>
	</form>
	
	<!-- BORANG TAMBAH SOALAN TAMAT -->
	<br>
</div>
<br>
<br>
<style>
.b {
  font-family: Arial, Helvetica, sans-serif;
}
h3 {
  font-family: Arial, Helvetica, sans-serif;
}
body{
background-repeat: no repeat;
background-attachment: fixed;
background-size: 100% 100%;
background-color: #CCCCCC;}
</style>
<!-- </body> tamat -->
