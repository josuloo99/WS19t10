<?php
  session_start();
?>
<?php include 'DbConfig.php' ?>
<?php
	if (isset($_SESSION['eposta']) && $_SESSION['mota'] == 'admin')
	    $user = $_SESSION['eposta'];
  else
    echo "<script>
              alert('Ez zaude baimenduta hona sartzeko.');
              window.history.back();
          </script>";

	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
    		or die ("Errorea Dbra konektatzerakoan");

    $eposta = $_POST['eposta'];

    $sql = "DELETE FROM users WHERE eposta = '$eposta'";

    if (mysqli_query($esteka, $sql)){
    	echo "Ok";
    }
    else
    	echo "er";

    mysqli_close($esteka);

?>