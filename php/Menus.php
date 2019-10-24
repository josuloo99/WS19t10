<div id='page-wrap'>
<header class='main' id='h1'>
<?php include 'DbConfig.php' ?>
<?php
if(isset($_GET['usr'])){
	$erabiltzailea = $_GET['usr'];
	echo $erabiltzailea;
	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
	or die ("Errorea Dbra konektatzerakoan");
	$sql ="SELECT argazkia FROM users WHERE eposta='$erabiltzailea'";

	$profileimage = mysqli_query($esteka, $sql);

	$ilara = mysqli_fetch_array($profileimage, MYSQLI_ASSOC);
	if($ilara['argazkia'] != null) {
		echo '<td><img style="height:50px;max-widtd:50" src="data:argazkia/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'"/></td>';
	}
	else {
		echo '<img style="height:50px;max-widtd:50" src="../images/user.png"/>';
	}
	echo "
			<span class='right'><a href='Layout.php' onClick='return logout();'>Logout</a></span>
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
if(isset($_GET['usr'])){
	$erabiltzailea = $_GET['usr'];
	echo "<html>
		<span><a href='Layout.php?usr=$erabiltzailea'>Hasiera</a></span>
		<span><a href='QuestionFormWithImage.php?usr=$erabiltzailea'>Galderak sortu</a></span>
		<span><a href='ShowQuestionsWithImage.php?usr=$erabiltzailea'>Erakutsi galderak</a></span>
		<span><a href='Credits.php?usr=$erabiltzailea'>Kredituak</a></span>
		</html>";
}
else {
	echo"
			<span><a href='Layout.php'>Hasiera</a></span>
			<span><a href='Credits.php'>Kredituak</a></span>";
}
?>
<script type="text/javascript">
    function logout(event){
        alert("Agur! Beste bat arte!");
        return true;
    }
</script>



</nav>

