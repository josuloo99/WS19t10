function galderakEskatu() {
    $.ajax({
        type: "GET",
        url: "../xml/Questions.xml",
        dataType: "xml",
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
        	var obj = $("#emaitza");
        	obj.text("");
			var table="<table><tr><th>Egilea</th><th>Galdera</th><th>Erantzun zuzena</th></tr>";
			var x = response.getElementsByTagName('assessmentitem');
			for (i = 0; i <x.length; i++) { 
	    		table += "<tr><td>" + x[i].getAttribute('author') + "</td><td>" + 
	    		x[i].getElementsByTagName("p")[0].childNodes[0].nodeValue + "</td><td>" +
	    		x[i].getElementsByTagName("value")[0].childNodes[0].nodeValue + "</td></tr>";}
			
			table += "</table>";
			obj.append(table);
        }
    });
}

function galderakEzkutatu(){
	$('#emaitza').text("");
}

function galderakKontatu(user){
	$.ajax({
        type: "GET",
        url: "../xml/Questions.xml",
        dataType: "xml",
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
        	var obj = $("#galderaKont");
        	obj.text(user+" zara, eta zure galderak / galdera guztiak: ");
			var x = response.getElementsByTagName('assessmentitem');
			var nireak = 0;
			var denak = x.length;
			for (i = 0; i <x.length; i++) { 
	    		if(x[i].getAttribute('author') == user)
	    			nireak += 1;
	    	}
			
			obj.append(nireak+" / "+denak);
        }
    });
}