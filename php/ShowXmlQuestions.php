<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php if (isset($_SESSION['eposta']) && ($_SESSION['mota'] == 'ikasle' || $_SESSION['mota'] == 'irakasle'))
          $user = $_SESSION['eposta'];
        else{
          echo "<script>
                    alert('Ez zaude baimenduta hona sartzeko.');
                    window.history.back();
                </script>";
          exit();
        }
  ?>
  <section class="main" id="s1">
    <div id="taula">
       <?php
    $user = $_SESSION['eposta'];
    echo "<p>Datu baseko galderak ikusi nahi badituzu sakatu <a href='ShowQuestionsWithImage.php'>hemen</a></p><br>";
    ?>
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
	echo "</table>"
   ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
