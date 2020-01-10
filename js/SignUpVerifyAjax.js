var eposta = false;
var pass = false;

function egiaztatuEposta() {
    $.ajax({
        type: "POST",
        url: "../php/ClientVerifyEnrollment.php",
        data: "eposta=" + $('#eposta').val(),
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
            if (response == 'EZ') {
                $('#epostaKonprobatu').text('Eposta hori ez dago matrikulatuta');
                eposta = false;
            } else if (response == 'BAI') {
                $('#epostaKonprobatu').text('Ongi. Eposta matrikulatuta dago.');
                eposta = true;
            }

            if(eposta == true && pass == true){
                $("#bidali").removeAttr("disabled");
            }
            else{
                document.getElementById("bidali").disabled = true;
            }
        }
    });
}

function egiaztatuPasahitza() {
    $.ajax({
        type: "POST",
        url: "../php/ClientVerifyPass.php",
        data: "pasahitza=" + $('#pasahitza').val(),
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
            if (response == 'BALIOGABE') {
                $('#pasahitzaKonprobatu').text('Pasahitza baliogabea da');
                pass = false;
            } else if (response == 'BALIOZKO') {
                $('#pasahitzaKonprobatu').text('Ongi. Pasahitz egokia.');
                pass = true;
            }
            
            if(eposta == true && pass == true){
                $("#bidali").removeAttr("disabled");
            }
            else{
                document.getElementById("bidali").disabled = true;
            }
        }
    });
}

function egiaztatuPasahitzaR() {
    $.ajax({
        type: "POST",
        url: "../php/ClientVerifyPass.php",
        data: "pasahitza=" + $('#pasahitza').val(),
        cache: false,
        error: function(e) {
            console.log("XML irakurketak akatsa izan du: ", e);
        },
        success: function(response) {
            if (response == 'BALIOGABE') {
                $('#pasahitzaKonprobatu').text('Pasahitza baliogabea da');
                document.getElementById("bidali").disabled = true;
            } else if (response == 'BALIOZKO') {
                $('#pasahitzaKonprobatu').text('Ongi. Pasahitz egokia.');
                $("#bidali").removeAttr("disabled");
            }
        }
    });
}