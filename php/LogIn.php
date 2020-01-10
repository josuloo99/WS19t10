<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="763354330997-plejlstf0nff6lahm6u9kd7ng33544c6.apps.googleusercontent.com">
</head>
<body>
  <?php include '../php/Menus.php' ?>
    <?php include 'DbConfig.php' ?>
  <section class="main" id="s1">

  <form action="LogIn.php" method="post" id="erregistroa" enctype = "multipart/form-data" name="erregistroa">
  <label>E-posta:</label>
  <input type="email" name="eposta" id="eposta" required>
  
  <br><br>
  
  <label>Pasahitza:</label>
  <input type="password" name="pasahitza">
  <br><br>

  <input type="submit" name="submit" value="Bidali">
  <input type="submit" name="ForgotPassword" value="Pasahitza ahaztu dut">
  </form>

  <br>
  <label>Beste era batera hasi nahi baduzu saioa:</label><br>
  <div class="g-signin2" data-onsuccess="onSignIn" align="center"></div>
  
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
        exit();
     }
    
    $sql = "SELECT eposta, pasahitza, mota, state FROM users WHERE eposta = '$eposta' ";

    $result = mysqli_query($esteka,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if ($row['state'] == 0) {
    if($row['eposta']==$eposta && password_verify($pasahitza, $row["pasahitza"])) {
      /*echo ("<script>
          alert('Ongi etorri!');
          window.location.assign('Layout.php?usr=".$eposta."');
      </script>");*/
      $_SESSION['eposta'] = $row['eposta'];
      $_SESSION['mota'] = $row['mota'];
      if($_SESSION['mota'] == 'ikasle' || $_SESSION['mota'] == 'irakasle'){
      echo ("<script>
          alert('Ongi etorri!');
          window.location.assign('HandlingQuizesAjax.php');
      </script>");
      }
      else{
         echo ("<script>
          alert('Ongi etorri!');
          window.location.assign('HandlingAccounts.php');
      </script>");
      }
    }
    else {
      echo "<script>
            alert('Sartutako datuak ez dira egokiak');
            </script>";
    }
    }
    else {
      echo "<script>
            alert('Kontua blokeatuta dago. Sentitzen dugu.');
            </script>";
    }

      mysqli_close($esteka);
    }
  

  if(isset($_POST['ForgotPassword'])) {
    $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");
    
      $eposta = $_POST['eposta'];

     if (empty($eposta)) {
       echo "<script> alert('Sartu eposta mesedez.');
                       window.history.back(); 

        </script>";
     }
    
    $sql = "SELECT eposta, pasahitza, mota, state, recovery FROM users WHERE eposta = '$eposta' ";

    $result = mysqli_query($esteka,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if (empty($row['eposta'])) {
        echo "<script> alert('Eposta hori ez da existitzen');
                       window.history.back(); 

        </script>";
    }
    else {
        //$pasahitza = rand(999, 99999);
        //$password_hash =  password_hash($pasahitza, PASSWORD_DEFAULT);
 
        //$sql2 = "UPDATE users SET pasahitza='$password_hash' WHERE eposta = '$eposta' ";
        //$result = mysqli_query($esteka, $sql2);
        //if($result){
        $to = $eposta;
        $recovery = $row['recovery'];
        $link = "https://wsloidimannion10.000webhostapp.com/pWS19/php/ChangePassword.php?rec=".$recovery;
        $subject = "Pasahitza aldatu";
        $message = "Mesedez, erabili esteka hau zure pasahitza aldatzeko: " . $link;
        $headers = "From : joane.mannion13@gmail.com";
        if(mail($to, $subject, $message)){
          echo("<br><br>");
          echo "Pasahitza aldatzeko esteka zure epostara bidali da.";
        }else{
          echo("<br><br>");
          echo "Arazo bat egon da eposta bidaltzeko, saiatu berriro.";
        }
        //}
        //else {
        //   echo "<script> alert('update gaixki'); </script>";
        //}
    }
  
      mysqli_close($esteka);
    }
  ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
<script type="text/javascript">
  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var name = profile.getName();
    var imageUrl = profile.getImageUrl();
    var email = profile.getEmail();

    /*
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.*/

    $.ajax({
      url: 'LogIn_Google.php',
      dataType: 'text',
      type : 'POST',
      data: {izena:name, irudia:imageUrl, eposta:email},
      success: function(response) {
        console.log(response);
        if(response == 'ok'){
          alert('Ongi etorri!');
          window.location.assign('HandlingQuizesAjax.php');
        }
        else if(response == 'ok2'){
          alert('Ongi etorri! Ongi erregistratu zara!');
          window.location.assign('HandlingQuizesAjax.php');
        }
      },
      error: function() {
            console.log("Errore bat egon da.");
        }
    });
  }
</script>
</html>