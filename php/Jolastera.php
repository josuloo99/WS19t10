<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="styles.css">
  <?php include '../html/Head.html'?>
</head>
<body onload="hasi()">
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php include 'DbConfig.php' ?>

    <h3>Gai hau aukeratu duzu: <?php echo $_POST['aukerak'];?></h3>
    <br><br>
    <h4 id="galdera"></h4>
    <br>
    <img src="" id="argazkia" onclick="hurrengoa()" style="max-width: 15%">
    <br>
    <button id="1" class="erantzun" onclick="konprobatu(this.name)"></button><br>
    <button id="2" class="erantzun" onclick="konprobatu(this.name)"></button><br>
    <button id="3" class="erantzun" onclick="konprobatu(this.name)"></button><br>
    <button id="4" class="erantzun" onclick="konprobatu(this.name)"></button><br>

  </section>
  <section class="main" id="s2" hidden="true">
  	<br><br>
  	<h3>Amaitu da! Hauek dira emaitzak:</h3>
  	<br>
  	<h5 id="ondo">Galdera hauek asmatu dituzu: </h5>
  	<br>
  	<h5 id="gaizki">Galdera hauek gaizki erantzun dituzu: </h5>
  	<br>
  	<br>
  	<button><a href="Layout.php">Itzuli hasierara</a></button>
  	<button><a href="GaiaAukeratu.php">Jolastu berriro!</a></button>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
<script type="text/javascript">
	var gaia = "<?php echo $_POST['aukerak'] ?>"; 
	var galderak = {};
	var non = 0;
	var zenbat = 0;
	var zuzenak = 0;
	var okerrak = 0;
	function hasi(){
		galderakLortu(gaia);
	}

	function galderakLortu(gaia){
		$.ajax({
	      url: "galderakEkarri.php",
	      type: "POST",
	      dataType: "JSON",
	      data: {gaiarloa:gaia},
	      success: function(response){
	        console.log(response);
	        galderak = shuffle(response);
	        zenbat = response.length;
	        erakutsiGaldera();
	      }
	    }).fail( function() {
	        console.log("errorea");
	    });
	}

	function erakutsiGaldera() {
		$("#galdera").text(galderak[non][0]);
        if(galderak[non][6]!=""){
        	$("#argazkia").attr("src", "data:image/png;base64, "+ galderak[non][6]);
    	}
    	var aukera = Math.round(Math.random() * 3);
    	console.log(aukera);
    	if(aukera == 0){
    		$("#1").text(galderak[non][1]);
    		$("#1").attr("name",1);
    		$("#2").text(galderak[non][2]);
    		$("#2").attr("name",0);
    		$("#3").text(galderak[non][3]);
    		$("#3").attr("name",0);
    		$("#4").text(galderak[non][4]);
    		$("#4").attr("name",0);
    	}
    	else if(aukera == 1){
    		$("#2").text(galderak[non][1]);
    		$("#2").attr("name",1);
    		$("#3").text(galderak[non][2]);
    		$("#3").attr("name",0);
    		$("#4").text(galderak[non][3]);
    		$("#4").attr("name",0);
    		$("#1").text(galderak[non][4]);
    		$("#1").attr("name",0);
    	}
    	else if(aukera == 2){
    		$("#3").text(galderak[non][1]);
    		$("#3").attr("name",1);
    		$("#4").text(galderak[non][2]);
    		$("#4").attr("name",0);
    		$("#1").text(galderak[non][3]);
    		$("#1").attr("name",0);
    		$("#2").text(galderak[non][4]);
    		$("#2").attr("name",0);
    	}
    	else if(aukera == 3){
    		$("#4").text(galderak[non][1]);
    		$("#4").attr("name",1);
    		$("#1").text(galderak[non][2]);
    		$("#1").attr("name",0);
    		$("#2").text(galderak[non][3]);
    		$("#2").attr("name",0);
    		$("#3").text(galderak[non][4]);
    		$("#3").attr("name",0);
    	}
	}

	function hurrengoa(){
		non += 1;
		if(non >= zenbat){
			alert("Ez dago galdera gehiago!");
			amaitu();
		}
		else{
			//console.log(non);
			erakutsiGaldera();
		}
	}

	function konprobatu(name){
		var aurrera = false;
		if(name == 1){
			zuzenak += 1;
			aurrera = confirm("Galdera ondo erantzun duzu!\nNahi duzu beste galdera bat?");
		}
		else{
			okerrak += 1;
			aurrera = aurrera = confirm("Galdera oker erantzun duzu :(\nNahi duzu beste galdera bat?");
		}
		if(aurrera)
			hurrengoa();
		else{
			amaitu();
		}
	}

	function amaitu(){
		$("#s1").attr("hidden", true);
		$("#s2").attr("hidden", false);
		$("#ondo").append(zuzenak);
		$("#gaizki").append(okerrak);
	}

	shuffle = function(v){
    	for(var j, x, i = v.length; i; j = parseInt(Math.random() * i), x = v[--i], v[i] = v[j], v[j] = x);
   		return v;
	};
</script>
</html>