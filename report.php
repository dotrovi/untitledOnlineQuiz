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

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
	<div class="noprint">
		<meta charset="utf-8">
		<title>KUIZ SAINS T2</title>
		<!-- sambungan ke css --> 
		<link rel="stylesheet" href="css/w3.css">
	</div>
	</head>
	
	<body>
		<div class="b w3-container w3-center">
			<?php
			//mendapatkan data dan menetapkan nama pembolehubah dari kotak carian pada carianrekod.php
			$search = $_POST['search'];
			
			//mendapatkan data drpd jadual skor, murid & topik berdasarkan carian, PANJANGNYA CODE JADI UJI BETUL-BETUL YA?
			$select = mysqli_query($con, "SELECT skor.*, murid.*, kuiz.topik FROM skor INNER JOIN murid ON skor.nokpmurid = murid.nokpmurid INNER JOIN kuiz ON kuiz.idkuiz = skor.idkuiz WHERE kuiz.idkuiz = '$search' ");
			$data = mysqli_fetch_array($select);
			?>
			<br>
			<h3><u>PRESTASI MURID BAGI KUIZ:</u></h3>
			<h3><b><?php echo $data['topik'] ?></b></h3><br>
			<div class="w3-container w3-centered">
				<table class="w3-table w3-border w3-centered" border="1">
					<tr>
						<th>BIL</th>
						<th>NAME</th>
						<th>NO IC</th>
						<th>CLASS</th>
						<th>TOTAL MARKS</th>
						<th>AMOUNT OF CORRECT ANSWER</th>
						<th>AMOUNT OF WRONG ASNWER</th>
					</tr>
					<tr>
						<?php
						//mendapatkan rekod drpd jadual skor, murid, dan topik berdasarkan carian
						$pilih = mysqli_query($con, "SELECT skor.*, murid.*, kuiz.topik FROM skor INNER JOIN murid ON skor.nokpmurid = murid.nokpmurid INNER JOIN kuiz ON kuiz.idkuiz = skor.idkuiz WHERE kuiz.idkuiz = '$search' ");
					
						//jika tiada sebarang rekod dijumpai
						if (mysqli_num_rows($pilih) == 0) {
							echo '<tr><td colspan = "7">No Record Found</td></tr>';
						} else {
							// tetapkan nilai $no = 1
							$no = 1;
							//memaparkan data selagi terdapat rekod dalam jadual skor, murid dan topik
							while ($row = mysqli_fetch_array($pilih)) {
								echo '<tr>
									<td>'.$no.'</td>
									<td>'.$row['nama'].'</td>
									<td>'.$row['nokpmurid'].'</td>
									<td>'.$row['kelas'].'</td>
									<td>'.$row['markah'].'%</td>
									<td>'.$row['betul'].'</td>
									<td>'.$row['salah'].'</td>
								</tr>';
								//membuat running number
								$no++;
							}
						}
						?>
					</tr>
				</table>
			</div>
		</div>
		<center>
		<div class="b noprint">
		<hr>
			<!-- butang untuk mencetak laporan -->
			<input type="button" class="w3-btn w3-border" value="CETAK" onClick="window.print()">
<style type="text/css">
@media print
{
.noprint {display:none;}
}

@media screen
{
...
}

</style>	
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<style>
h3{
  font-family: Arial, Helvetica, sans-serif;
}
.b {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
			<!-- butang untuk kembali ke laman utama -->
			<a href="senarai.php?q=1"><button class="w3-btn w3-border">MAIN MENU</button></a>
		</div>
		</center>
	</body>
</html>
