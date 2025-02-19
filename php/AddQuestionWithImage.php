<?php
  session_start();
?>
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
    //header("Control-cache: no-store, no-cache, must-revalidate" );
    //if(isset($_POST["submit"])){
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
      $irudia = $_POST['irudia'];





      if(empty($eposta) || empty($galdera) || empty($erantzunZuzena) || empty($erantzunOkerra1) || empty($erantzunOkerra2) || empty($erantzunOkerra3) || empty($gaiarloa)){
        echo "<script> alert('Ezin dute eremuek hutsik egon.');
                       window.history.back(); 

        </script>";
        exit;
      }
     
      if ((!preg_match("/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus)|(es)/", $eposta)) && (!preg_match("/^[a-z]+\.?[a-z]*@ehu\.(eus)|(es)/", $eposta))){
        echo "<script> alert('Emailaren egitura ez da egokia.');
                       window.history.back(); 

        </script>";
        exit;
      }

      if(strlen($galdera)<10){
        echo "<script> alert('Galdera motzegia da.');
                       window.history.back(); 

        </script>";
      }

  	  if (!empty($_FILES['irudia']['name']) && !empty($_FILES['irudia']['tmp_name'])){
    		$irudia = $_FILES['irudia']['tmp_name'];
    		$izena = $_FILES['irudia']['name'];
    		$irudia = addslashes(file_get_contents($_FILES['irudia']['tmp_name'])); 
    	}	

      if(!empty($irudia)) {
    		$sql = "INSERT INTO questions VALUES ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$gaiarloa', '$irudia')";
      }
    	else {
    		$sql = "INSERT INTO questions (eposta, galdera, erantzunZuzena, erantzunOkerra1, erantzunOkerra2, erantzunOkerra3, zailtasuna, gaiarloa) VALUES ('$eposta', '$galdera', '$erantzunZuzena', '$erantzunOkerra1', '$erantzunOkerra2', '$erantzunOkerra3', '$zailtasuna', '$gaiarloa')";
    	}
  	
    	if (mysqli_query($esteka, $sql)) {
    		echo "Oso ondo! Ikusi gordeta dauden galderak";
    		echo("<br><br>");
    		echo("<button onclick=\"location.href='ShowQuestionsWithImage.php'\"> Ikusi galderak </button>");
        echo("<br><br>");
        //echo '1';
    	}
    	else{
    		echo("Error description: " . mysqli_error($esteka));
    		echo("<br><br>");
    		echo("<button onclick=\"location.href='QuestionFormWithImage.php'\"> Saiatu berriro </button>");
        echo("<br><br>");
    	}


    	mysqli_close($esteka);
  //}
  	?>	


    <?php
    $xml = simplexml_load_file("../xml/Questions.xml");

    $question = $xml->addChild('assessmentitem');
    $question->addAttribute('author', $eposta);
    $question->addAttribute('subject', $gaiarloa);
    $itemBody = $question->addChild('itembody');
    $itemBody -> addChild('p', $galdera);

    $correct = $question->addChild('correctresponse');
    $correct->addChild('value', $erantzunZuzena);
    $incorrectResponses = $question->addChild('incorrectresponses');
    $incorrectResponses->addChild('value', $erantzunOkerra1);
    $incorrectResponses->addChild('value',$erantzunOkerra2);
    $incorrectResponses->addChild('value',$erantzunOkerra3);

    if($xml->asXML('../xml/Questions.xml')){
      echo "Ondo sartu dira galderak XMLn";
    }
    else{
      echo "Arazoak egon dira galderak sartzerakoan.";
    }
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>