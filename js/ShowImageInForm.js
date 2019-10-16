function preview_image(event) {

 var irudia = $('#irudia')[0].files[0];
 var totalSize = (irudia.size / Math.pow(1024,2));

 if(totalSize>1) {
          $("#irudierror").text('Irudiak ezin du 1MB baino handiagoa izan, ez da igoko.');
 }
 else{
 	$("#irudierror").text("");
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('output_image');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
	}
}