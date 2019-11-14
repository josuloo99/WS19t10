 function egiaztatu(){
      var email=$("[name='eposta']").val();
      var galdera=$("[name='galdera']").val();
	  var erantzunZuzena=$("[name='erantzunZuzena']").val();
	  var erantzunOkerra1=$("[name='erantzunOkerra1']").val();
	  var erantzunOkerra2=$("[name='erantzunOkerra2']").val(); 
	  var erantzunOkerra3=$("[name='erantzunOkerra3']").val(); 
	  var gaiArloa=$("[name='gaiarloa']").val();
	  var irudia = $('#irudia')[0].files[0];
	  var totalSize = (irudia.size / Math.pow(1024,2));
	  
	  //var zailtasuna=$("input[name='zailtasuna']:checked").val();
	  
	  $(".error").remove();

      var REemail = /^([a-z]+[0-9]{3})(@ikasle\.ehu\.)[(eus)|(es)]/;
      var REemail2 = /^[a-z]+\.?[a-z]*@ehu\.[(eus)|(es)]/;
	  var ondoDago = true;

	  /*if(totalSize>1) {
          $("[name='irudia']").after('<br><span class="error">Irudiak ezin du 1MB baino handiagoa izan</span>');
		  ondoDago = false;
      }*/
      if(!(REemail.test(email) | REemail2.test(email))){
		  $("[name='eposta']").after('<span class="error">Emaila ez dago ondo.</span>');
		  ondoDago = false;
	  }
      if(galdera.length<=10) {
          $("[name='galdera']").after('<span class="error">Galdera motzegia da.</span>');
		  ondoDago = false;
      }
	  if(erantzunZuzena.length<1) {
          $("[name='erantzunZuzena']").after('<span class="error">Sartu erantzun zuzen bat.</span>');
		  ondoDago = false;
      }
	  if(erantzunOkerra1.length<1) {
          $("[name='erantzunOkerra1']").after('<span class="error">Sartu erantzun oker bat.</span>');
		  ondoDago = false;
      }
	  if(erantzunOkerra2.length<1) {
          $("[name='erantzunOkerra2']").after('<span class="error">Sartu erantzun oker bat.</span>');
		  ondoDago = false;
      }
	  if(erantzunOkerra3.length<1) {
          $("[name='erantzunOkerra3']").after('<span class="error">Sartu erantzun oker bat.</span>');
		  ondoDago = false;
      }
	  if(gaiArloa.length<1) {
          $("[name='gaiarloa']").after('<span class="error">Idatzi gai arlo bat.</span>');
		  ondoDago = false;
      }
       return ondoDago;
  
}
	
