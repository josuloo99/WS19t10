<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
   <?php include 'DbConfig.php' ?>
   <?php
   $xml = simplexml_load_file('../xml/Questions.xml')
   		or die('Error: Cannot create object');
   	echo "<table>";
   	echo "<tr>";
   	echo "<th>Egilea</th>";
   	echo "<th>Galdera</th>";
   	echo "<th>Erantzun zuzena</th>";
   	echo "</tr>";
   	foreach($xml->children() as $questions) {
   	echo "<tr>";
   	echo "<td>" . $questions->attributes()->author ."</td>";
   	echo "<td>" . $questions->itembody->p  ."</td>";
   	echo "<td>" . $questions->correctresponse->value."</td>";;
    echo "</tr>";
	}
	echo "</tabele>"
   ?>
</section>
<?php include '../html/Footer.html' ?>
</body>
</html>
