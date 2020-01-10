
var xhro = new XMLHttpRequest();

xhro.onreadystatechange = function() {
	if(xhro.readyState === 4 && xhro.status === 200){
		alert("Galdera ondo sartu da!");
		galderakEskatu();
	}
}

function galderaGehitu(form) {
	console.log($('#irudia')[0]);
	var data = new FormData();
	data.append('irudia',$('#irudia')[0].files[0]);

	if(form[6].checked == true)
		var zail = 1;
	else if(form[7].checked == true)
		var zail = 2;
	else if(form[8].checked == true)
		var zail = 3;


	// $.ajax {
	// 	type: "POST",
 //        url: "../php/AddQuestionWithImage.php",
 //        data: form,
 //        cache: false,
 //        error: function(e) {
 //            console.log("XML irakurketak akatsa izan du: ", e);
 //        },
 //        success: function(response) {
            
 //        }

	// }

	xhro.open("POST","../php/AddQuestionWithImage.php", true);
	xhro.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhro.send("eposta="+form[0].value+
			  "&galdera="+form[1].value+
			  "&erantzunZuzena="+form[2].value+
			  "&erantzunOkerra1="+form[3].value+
			  "&erantzunOkerra2="+form[4].value+
			  "&erantzunOkerra3="+form[5].value+
			  "&zailtasuna="+zail+
			  "&gaiarloa="+form[9].value+
			  "&irudia="+data);
};
   	

