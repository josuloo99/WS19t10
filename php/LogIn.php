<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php include 'DbConfig.php' ?>
	<section class="main" id="s1">

  <form action="LogIn.php" method="post" id="erregistroa" enctype = "multipart/form-data" name="erregistroa">
  <label>E-posta:</label>
  <input type="email" name="eposta" id="eposta" required>
  
  <br><br>
  
  <label>Pasahitza:</label>
  <input type="password" name="pasahitza" required>
  <br><br>

  <input type="submit" name="submit" value="Bidali">
  </form>

    <?php
		if(isset($_POST['submit'])){ 
      $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");
		
      $eposta = $_POST['eposta'];
      $pasahitza = $_POST['pasahitza'];

	   if (empty($eposta) || empty($pasahitza)) {
		   echo "<script> alert('Sartu eposta eta pasahitza mesedez.');
                       window.history.back(); 

        </script>";
	   }
		
		$sql = "SELECT eposta, pasahitza FROM users WHERE eposta = '$eposta' ";

		$result = mysqli_query($esteka,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if($row['eposta']==$eposta && password_verify($pasahitza, $row["pasahitza"])) {
			header("location: Layout.php?usr=".$eposta."");			
		}
		else {
			echo"Sorry, your credentials are not valid, Please try again.";
		}

      mysqli_close($esteka);
		}
	?>  
	  </section>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>