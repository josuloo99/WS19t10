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
      $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");
      $eposta = $_POST['eposta'];
    $erabiltzailemota = $_POST['erabiltzailemota'];
      $izenabizen = $_POST['izenabizen'];
      $pasahitza1 = $_POST['pasahitza'];
    $pasahitza2 = $_POST['pasahitza2'];
    if(strlen($pasahitza1)<6){
        echo "<script> alert('Pasahitza motzegia da.');
                       window.history.back(); 
        </script>";
      }
    if ($pasahitza1 != $pasahitza2) {
      echo "<script> alert('Bi pasahitzak berdinak izan behar dute.');
                       window.history.back(); 
        </script>";
    }
    $pasahitza = password_hash($pasahitza1, PASSWORD_DEFAULT); 

      if (!empty($_FILES['irudia']['name']) && !empty($_FILES['irudia']['tmp_name'])){
        $irudia = $_FILES['irudia']['tmp_name'];
        $izena = $_FILES['irudia']['name'];
        $irudia = addslashes(file_get_contents($_FILES['irudia']['tmp_name']));
        $sql = "INSERT INTO users VALUES ('$eposta', '$erabiltzailemota', '$izenabizen', '$pasahitza', '$irudia')";
      }
      else {
        $sql = "INSERT INTO users (eposta, mota, izena, pasahitza) VALUES ('$eposta', '$erabiltzailemota', '$izenabizen', '$pasahitza')";
      }
      if (mysqli_query($esteka, $sql)) {
          echo ("<script>
                    window.location.assign('LogIn.php');
                </script>");
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