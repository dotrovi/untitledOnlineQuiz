<!DOCTYPE html>
<html lang="en" dir="ltr">

        <head>
                <meta charset= "utf-8">
                <title>QUIZ</title>
                <link rel="stylesheet" href="css/w3.css">
                <link rel="stylesheet" type="text/css" href="css/main.css">
        </head>

        <body>
                <div id="page-containter">
                        <div id="content-wrap">
                                <div class="w3-container w3-center" style="width:50%; margin: 0px auto;">
		                        <p class="w3-audiowide w3-jumbo w3-animate-opacity">KUIZ SAINS T2</p>
			                <div class="w3-border w3-brown">
				                <div class="w3-container w3-margin w3-light-green w3-animate-opacity">
				                        <p class="b"> UJI PENGETAHUAN ANDA </p>
	
                                                        <!-- BORANG LOG MASUK -->
				                        <form action="LoginProcess.php?q=1" method="post" class="textFormat">
					                        <input class="w3-input w3-center" type="text" name="username" placeholder="USERNAME [MURID]">
					                        <input class="w3-input w3-center" type="password" name="pwd" placeholder="KATA LALUAN">
					                        <br>
					                        <button class="w3-btn w3-green" type="submit" name="login">LOG MASUK</button> | <a href="daftarmurid.php" class="w3-btn w3-blue" type="submit" name="signup">DAFTAR MASUK</a>
					                        <br><br>
				                        </form>
                                                    	<!-- TAMAT BORANG LOG MASUK -->
				                </div>
			                </div>
		                </div>
		                <br><br><br><br>
		                <div class="b w3-center">
			                <a href="index.php" class="w3-btn w3-round-xxlarge w3-pale-green w3-animate-zoom" type="submit" name="menu">LAMAN UTAMA</a>
		                </div>
                        </div>
                        <footer id="footer">TEAM ROVI</footer>
                </div>
        </body>
</html>
