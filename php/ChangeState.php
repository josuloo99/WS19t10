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
    $egoera = $_POST['egoera'];

    if ($egoera == 'Aktibo'){
    	$sql = "UPDATE users SET state = 1 WHERE eposta = '$eposta'";
    	if (mysqli_query($esteka, $sql)){
    		echo "Blokeatua";
    	}
    	else
    		echo "er";
    }
    else {
    	$sql = "UPDATE users SET state = 0 WHERE eposta = '$eposta'";
    	if (mysqli_query($esteka, $sql)){
    		echo "Aktibo";
    	}
    	else
    		echo "er";
    }

    mysqli_close($esteka);

?>