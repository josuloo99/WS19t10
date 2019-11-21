<?php
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');

	$soap = new nusoap_client("http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl", true);
	$eposta = $_POST['eposta'];

	$emaitza = $soap->call('egiaztatuE',array('x' => $eposta));
	

	echo $emaitza;		

?>