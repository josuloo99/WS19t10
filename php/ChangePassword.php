<?php
  session_start();
  $recovery = $_GET['rec'];
?>
<!DOCTYPE html>
<html>
<head>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/SignUpVerifyAjax.js"></script>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
    <?php include 'DbConfig.php' ?>
	<section class="main" id="s1">

  <form action="ChangePassword.php?rec=<?php echo $recovery?>" method="post" id="erregistroa" enctype = "multipart/form-data" name="erregistroa" onsubmit="return berdinak()">
  <label>Sartu pasahitz berria:</label>
  <input type="password" name="pasahitza" id="pasahitza" onchange="egiaztatuPasahitzaR()" required><br>
  <div id="pasahitzaKonprobatu"> </div>
  <br>
  
  <label>Errepikatu pasahitza:</label>
  <input type="password" name="pasahitzaR" id="pasahitza2" required>
  <br><br>

  <input type="submit" id="bidali" name="submit" value="Aldatu pasahitza">
  </form>

    <?php
		if(isset($_POST['submit'])){
      	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");

      $pasahitza = $_POST['pasahitza'];

	   if (empty($pasahitza)) {
		   echo "<script> alert('Sartu pasahitza mesedez.');
                       window.history.back();
        </script>";
	   }

    $pasahitza = password_hash($pasahitza, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET pasahitza = '$pasahitza' WHERE recovery = '$recovery'";
		//$sql = "SELECT eposta FROM users WHERE recovery = '$recovery' ";

		if(mysqli_query($esteka,$sql)){
      echo "<script> alert('Ondo aldatu da pashitza.');
        </script>";
    }
    else{
      echo "<script> alert('Arazoak pasahitza aldatzean.');
        </script>";
      }
      mysqli_close($esteka);
		}
	?>  
	  </section>

  <?php include '../html/Footer.html' ?>
</body>
<script type="text/javascript">
  function berdinak(){
    var erroreak = "";
    var pas1 = $('#pasahitza').val();
    var pas2 = $('#pasahitza2').val();
  

    if(pas1.length < 6)
      erroreak += "Pasahitza motzegia da.\n";
    if(pas1 != pas2)
      erroreak += "Pasahitzak ez dira berdinak\n";
    if(erroreak != ""){
      alert(erroreak);
      return false;
    }
    return true;

  }
</script>
</html>