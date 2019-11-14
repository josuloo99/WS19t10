
var xhro = new XMLHttpRequest();

xhro.onreadystatechange = function() {
	if(xhro.readyState === 4 && xhro.status === 200){
		alert("Galdera ondo sartu da!");
		galderakEskatu();
	}
}

function galderaGehitu(form) {
	xhro.open("POST","../php/AddQuestionWithImage.php", true);
	xhro.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhro.send("eposta="+form[0].value+
			  "&galdera="+form[1].value+
			  "&erantzunZuzena="+form[2].value+
			  "&erantzunOkerra1="+form[3].value+
			  "&erantzunOkerra2="+form[4].value+
			  "&erantzunOkerra3="+form[5].value+
			  "&zailtasuna="+form[6].value+
			  "&gaiarloa="+form[7].value);
};
   	

