<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
  <script type="text/javascript" src="../js/credits.js"></script>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <style type="text/css">
  	#geo{
  		font-size: 12px;
  	}
  </style>
</head>
<body onload="geolokalizatu()">
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <h2>EGILEAREN/EN DATUAK</h2>
	  <br>
	  <p>Josu Loidi eta Joane Mannion</p>
	  <br>
	  <p>Software Ingeniaritza</p>
	  <br>
	  <p>Usurbil, Zarautz</p>
	  <br>
	  <img src="../images/kredituak2.png" />
	  <img src="../images/kredituak1.jpg" />
	  <br><br>
	  <div id="geo"></div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
