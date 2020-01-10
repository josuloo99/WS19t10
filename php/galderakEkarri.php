<?php
include 'DbConfig.php';

$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");

$gaia = $_POST['gaiarloa'];

$sql = "SELECT * FROM questions WHERE gaiarloa = '$gaia'";
$result = mysqli_query($esteka,$sql);

$galderak = array();

while($row = mysqli_fetch_assoc($result)) {
	$galdera = array();
	$galdera[] = $row['galdera'];
	$galdera[] = $row['erantzunZuzena'];
	$galdera[] = $row['erantzunOkerra1'];
	$galdera[] = $row['erantzunOkerra2'];
	$galdera[] = $row['erantzunOkerra3'];
	$galdera[] = $row['zailtasuna'];
	$galdera[] = base64_encode($row['irudia']);

  	array_push($galderak, $galdera);
}

mysqli_close($esteka);

echo json_encode($galderak);
?>