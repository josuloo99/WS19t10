function geolokalizatu(){
	var hiria = geoplugin_city();
	var latitudea = geoplugin_latitude();
	var longitudea = geoplugin_longitude();
	$("#geo").text("Non: " + hiria + ", " + latitudea + ", " + longitudea + ".");
}