$(document).ready(function() {
	$.get('../xml/Users.xml', function(d){
		var epostenZer = $(d).find('eposta');
		for (var i = 0; i < epostenZer.length; i++){
			$('#lista').append($('<option>',{
				value: epostenZer[i].childNodes[0].nodeValue,
				text: epostenZer[i].childNodes[0].nodeValue
			}));
		}
		$('#lista').append($('<option>',{
				value: 'asmatutakoa001@ikasle.ehu.eus',
				text: 'asmatutakoa001@ikasle.ehu.eus'
		}));
	});
});


function erakutsiInfo(){
	var eposta = $("#lista").val();

	$.get('../xml/Users.xml', function( data ){

		var xml = new XMLSerializer().serializeToString(data);
    	var xmlDoc = $.parseXML( xml );
    	var xml = $( xmlDoc );

    	var x = xmlDoc.getElementsByTagName("erabiltzailea");

    	var bilatuta = false;

    	for (var i = 0; i < x.length; i++) {

    		var a = x[i].childNodes;
    		var aemail = a[1].firstChild.nodeValue

    		if(aemail == eposta){
    			bilatuta = true;
    			break;
    		}
		}

		if(bilatuta){
			$("#eposta").text(a[1].firstChild.nodeValue);
			$("#izena").text(a[3].firstChild.nodeValue);
			$("#abizena").text(a[5].firstChild.nodeValue);
			$("#abizena2").text(a[7].firstChild.nodeValue);
			$("#tel").text(a[9].firstChild.nodeValue);


			$('table').show();
			$('label').show();
			/*var all = document.getElementsByClassName('emaitza');
			for (var i = 0; i < all.length; i++) {
	 			all[i].hidden = false;
			}*/


		}
		else{
			$('table').hide();
			$('label').hide();
			alert("Ez da aurkitu email hori duen erabiltzailerik.");
		}
	});
}