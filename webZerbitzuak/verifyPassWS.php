<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns = "https://wsloidimannion10.000webhostapp.com/pWS19/webZerbitzuak/verifyPassWS.php?wsdl";
$server = new soap_server;
$server->configureWSDL('pasahitzaEgiaztatu', $ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('pasahitzaEgiaztatu',array('x'=>'xsd:string'),array('return'=>'xsd:string'),$ns);

function pasahitzaEgiaztatu($x) {
	$pass = fopen("../txt/toppasswords.txt", "r") or die("Ezin izan da dokumentua ireki!");
	while (!feof($pass)) {
	  $lerroa = fgets($pass);
  	  if(strcmp(trim($lerroa),trim($x))== 0) {
  	  	fclose($pass);
		return 'BALIOGABE';
  	  }
	}
	fclose($pass);
	return 'BALIOZKO';

}

if (!isset( $HTTP_RAW_POST_DATA )) {
	$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
}
$server->service($HTTP_RAW_POST_DATA);
?>