<?php
    if(!isset($_SESSION))  
        session_start();
?>
<meta name="google-signin-client_id" content="763354330997-plejlstf0nff6lahm6u9kd7ng33544c6.apps.googleusercontent.com">
<div id='page-wrap'>
<header class='main' id='h1'>
<?php include 'DbConfig.php' ?>
<?php
if (isset($_SESSION['eposta'])){
	$user = $_SESSION['eposta'];
	echo $user;
	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
	or die ("Errorea Dbra konektatzerakoan");
	$sql ="SELECT argazkia, recovery FROM users WHERE eposta='$user'";

	$profileimage = mysqli_query($esteka, $sql);

	$ilara = mysqli_fetch_array($profileimage, MYSQLI_ASSOC);
	$recovery = $ilara['recovery'];
	if($ilara['argazkia'] != null) {
		echo '<td><img style="height:50px;max-widtd:50" src="data:argazkia/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'"/></td>';
	}
	else {
		echo '<img style="height:50px;max-widtd:50" src="../images/user.png"/>';
	}
	echo "
			<span class='right'><a href='LogOut.php' onclick='signOut();'>Logout</a></span>
			<span class='right'><a href='ChangePassword.php?rec=$recovery'>Pasahitza aldatu</a></span>
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
		<span><a href='GaiaAukeratu.php'>Jolastera!</a></span>
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

<script type="text/javascript">

    function onLoad() {
        gapi.load('auth2', function() {
            gapi.auth2.init();
        });
        //signOut();
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            auth2.disconnect();
            console.log('User signed out.');
        });

    }
</script>

<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

