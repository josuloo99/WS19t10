<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	$soap = new nusoap_client("https://wsloidimannion10.000webhostapp.com/pWS19/webZerbitzuak/verifyPassWS.php?wsdl", true);
	$pass = $_POST['pasahitza'];

	$emaitza = $soap->call('pasahitzaEgiaztatu',array('x' => $pass));
	

	echo $emaitza;		

?>