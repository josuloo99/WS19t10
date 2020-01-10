<?php
session_start();
?>
<?php

include 'DbConfig.php';

$izena = $_POST['izena'];
$argazkiURL = $_POST['irudia'];
$eposta = $_POST['eposta'];

$er = "ok";

$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
        or die ("Errorea Dbra konektatzerakoan");

$sql = "SELECT eposta FROM users WHERE eposta = '$eposta' ";

$result = mysqli_query($esteka,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if (empty($row['eposta'])) {
    $sql = "INSERT INTO users (eposta, mota, izena, pasahitza) VALUES ('$eposta', 'ikasle', '$izena', '0')";
    mysqli_query($esteka, $sql);
    $er = "ok2";
}

$_SESSION['eposta'] = $eposta;
$_SESSION['mota'] = 'ikasle';
echo $er;

?>