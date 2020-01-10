<?php
include 'DbConfig.php';

$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");

$sql = "SELECT DISTINCT gaiarloa FROM questions";
$result = mysqli_query($esteka,$sql);

$solutions = array();

while($row = mysqli_fetch_assoc($result)) {
  array_push($solutions, $row['gaiarloa']);
}

mysqli_close($esteka);

echo json_encode($solutions);
?>