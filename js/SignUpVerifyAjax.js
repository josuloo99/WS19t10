function egiaztatuEposta() {
    $.ajax({
        type: "POST",
        url: "../php/ClientVerifyEnrollment.php",
        data: "eposta="+$('#eposta').val(),
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
        	if(response == 'EZ') {
                $('#epostaKonprobatu').text('Eposta hori ez dago matrikulatuta');
            }
            else if(response == 'BAI') {
                 $('#epostaKonprobatu').text('Ongi. Eposta matrikulatuta dago.');
            }
        }
    });
}
function egiaztatuPasahitza() {
    $.ajax({
        type: "POST",
        url: "../php/ClientVerifyPass.php",
        data: "pasahitza="+$('#pasahitza').val(),
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
            if(response == 'BALIOGABE') {
                $('#pasahitzaKonprobatu').text('Pasahitza baliogabea da');
            }
            else if(response == 'BALIOZKO') {
                 $('#pasahitzaKonprobatu').text('Ongi. Pasahitz egokia.');
            }
        }
    });
}