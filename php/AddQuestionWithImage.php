<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  	<?php include 'DbConfig.php' ?>
    <?php
  	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
  		or die ("Errorea Dbra konektatzerakoan");

  	$eposta = $_POST['eposta'];
  	$galdera = $_POST['galdera'];
  	$erantzunZuzena = $_POST['erantzunZuzena'];
  	$erantzunOkerra1 = $_POST['erantzunOkerra1'];
  	$erantzunOkerra2 = $_POST['erantzunOkerra2'];
  	$erantzunOkerra3 = $_POST['erantzunOkerra3'];
  	$zailtasuna = $_POST['zailtasuna'];
  	$gaiarloa = $_POST['gaiarloa'];
	  if (!empty($_FILES['irudia']['name']) && !empty($_FILES['irudia']['tmp_name'])){
  		#echo 'ezzzz';
  		$irudia = $_FILES['irudia']['tmp_name'];
  		$izena = $_FILES['irudia']['name'];
  		$irudia = addslashes(file_get_contents($_FILES['irudia']['tmp_name']));
  		
  		$sql = "INSERT INTO questions VALUES ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$gaiarloa', '$irudia')";
  	}
  	else {
  		$sql = "INSERT INTO questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, gaiarloa) VALUES ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$gaiarloa')";
  	}
	
  	if (mysqli_query($esteka, $sql)) {
  		echo "Oso ondo! Ikusi gordeta dauden galderak";
  		echo("<br><br>");
  		echo("<button onclick=\"location.href='ShowQuestionsWithImage.php'\"> Ikusi galderak </button>");
  	}
  	else{
  		echo("Error description: " . mysqli_error($esteka));
  		echo("<br><br>");
  		echo("<button onclick=\"location.href='QuestionFormWithImage.php'\"> Saiatu berriro </button>");
  	}


  	mysqli_close($esteka);
  	?>	
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>