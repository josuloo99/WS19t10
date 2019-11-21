<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	$soap = new nusoap_client("http://localhost/pWS19Loidi_Mannion/webZerbitzuak/verifyPassWS.php?wsdl", true);
	$pass = $_POST['pasahitza'];

	$emaitza = $soap->call('pasahitzaEgiaztatu',array('x' => $pass));
	

	echo $emaitza;		

?>