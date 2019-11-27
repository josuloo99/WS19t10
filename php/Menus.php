<?php
    if(!isset($_SESSION))  
        session_start();
?>
<div id='page-wrap'>
<header class='main' id='h1'>
<?php include 'DbConfig.php' ?>
<?php
if (isset($_SESSION['eposta'])){
	$user = $_SESSION['eposta'];
	echo $user;
	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
	or die ("Errorea Dbra konektatzerakoan");
	$sql ="SELECT argazkia FROM users WHERE eposta='$user'";

	$profileimage = mysqli_query($esteka, $sql);

	$ilara = mysqli_fetch_array($profileimage, MYSQLI_ASSOC);
	if($ilara['argazkia'] != null) {
		echo '<td><img style="height:50px;max-widtd:50" src="data:argazkia/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'"/></td>';
	}
	else {
		echo '<img style="height:50px;max-widtd:50" src="../images/user.png"/>';
	}
	echo "
			<span class='right'><a href='LogOut.php'>Logout</a></span>
			";
	
	
}
else {
	echo "Anonimoa";
	echo "
			<span class='right'><a href='SignUp.php'>Erregistratu</a></span>
			<span class='right'><a href='LogIn.php'>Login</a></span>
			";
}


?>

</header>
<nav class='main' id='n1' role='navigation'>

<?php
if(isset($_SESSION['eposta'])){
	$user = $_SESSION['eposta'];
	$mota = $_SESSION['mota'];
	if($mota == 'admin'){
		echo "<html>
		<span><a href='Layout.php'>Hasiera</a></span>
		<span><a href='HandlingAccounts.php'>Kudeatu kontuak</a></span>
		<span><a href='Credits.php'>Kredituak</a></span>
		</html>";

	}
	elseif ($mota == 'ikasle' || $mota == 'irakasle'){
	echo "<html>
		<span><a href='Layout.php'>Hasiera</a></span>
		<span><a href='QuestionFormWithImage.php'>Galderak sortu</a></span>
		<span><a href='ShowXmlQuestions.php'>XML galderak ikusi</a></span>
		<span><a href='HandlingQuizesAjax.php'>Ajax galderak kudeatu</a></span>
		<span><a href='Credits.php'>Kredituak</a></span>
		</html>";
	}
}
else {
	echo"
			<span><a href='Layout.php'>Hasiera</a></span>
			<span><a href='Credits.php'>Kredituak</a></span>";
}
?>


</nav>

