<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="eu">
<head>
<title> Erregistratu </title>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ShowImageInForm.js"></script>
  <script src="../js/SignUpVerifyAjax.js"></script>
  <?php include '../html/Head.html'?>
  <style>
  form .error {
  color: #ff0000;
  </style>
}
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">

  <form action="" method="post" id="erregistroa" enctype = "multipart/form-data" name="erregistroa">
    <label>E-posta:</label>
    <input type="email" name="eposta" id="eposta" onchange="egiaztatuEposta()" pattern="([a-z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es)))|([a-z]+\.?[a-z]*@ehu\.((eus)|(es)))" required>
    <div id="epostaKonprobatu"> </div>
    
    <br>

    <label>Aukeratu erabiltzaile mota:</label>
    <input type="radio" name="erabiltzailemota" value="ikasle"> Ikaslea
    <input type="radio" name="erabiltzailemota" value="irakasle"> Irakaslea

    <br><br>
   
    <label>Izen abizenak:</label>
    <input type="text" name="izenabizen" pattern=".+\s.+(\s.+)*"required>
    <br><br>

    <label>Pasahitza:</label>
    <input type="password" name="pasahitza" id="pasahitza" onchange="egiaztatuPasahitza()" required>
    <div id="pasahitzaKonprobatu"> </div>

    <br>

    <label>Pasahitza errepikatu:</label>
    <input type="password" name="pasahitza2" required>
    <br><br>

    <label>Argazkia:</label>
    <input type="file" name="irudia" id="irudia" accept="image/*" onchange="preview_image(event)">
    <br>
    <p id="irudierror" span class="error"></p>
    <img id="output_image"/>
    <br><br>

    <input type="submit" name="submit" value="Bidali" id="bidali" disabled>
  </form>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>


<?php include 'DbConfig.php' ?>
<?php
  if(isset($_POST['submit'])){
    $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
      or die ("Errorea Dbra konektatzerakoan");
    $eposta = $_POST['eposta'];
    $erabiltzailemota = $_POST['erabiltzailemota'];
    $izenabizen = $_POST['izenabizen'];
    $pasahitza1 = $_POST['pasahitza'];
    $pasahitza2 = $_POST['pasahitza2'];
    if(strlen($pasahitza1)<6){
        echo "<script> alert('Pasahitza motzegia da.');
                       window.location.assign('SignUp.php');
        </script>";
        mysqli_close($esteka);
        exit();
      }
    if ($pasahitza1 != $pasahitza2) {
      echo "<script> alert('Bi pasahitzak berdinak izan behar dute.');
                      window.location.assign('SignUp.php');
        </script>";
        mysqli_close($esteka);
        exit();
    }

    $eskaera = "SELECT * FROM users WHERE eposta = '$eposta'";
    $result = mysqli_query($esteka, $eskaera);
    $data = mysqli_fetch_array($result);
    
    if(isset($data['eposta'])){
        echo ("<script>
                  alert('Eposta hau erabilita dago.');
              </script>");
        mysqli_close($esteka);
        exit();
    }

    $pasahitza = password_hash($pasahitza1, PASSWORD_DEFAULT); 

    if (!empty($_FILES['irudia']['name']) && !empty($_FILES['irudia']['tmp_name'])) {
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
                  alert('Ondo erregistratu zara.');
                  window.location.assign('LogIn.php');
              </script>");
    }
    else{
      echo("Error description: " . mysqli_error($esteka));
      echo("<br><br>");
      echo("<button onclick=\"location.href='QuestionFormWithImage.php'\"> Saiatu berriro </button>");
    }
    mysqli_close($esteka);
  }
?>  