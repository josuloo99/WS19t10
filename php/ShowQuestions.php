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
    $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
      or die ("Errorea Dbra konektatzerakoan");

      $sql = "SELECT * FROM questions";
      if($er = mysqli_query($esteka, $sql)){
        if(mysqli_num_rows($er) > 0){
          echo "<table>"; 
          echo "<tr>"; 
          echo "<th>E-maila</th>"; 
          echo "<th>Galdera</th>"; 
          echo "<th>Erantzun zuzena</th>"; 
          echo "<th>Erantzun okerra 1</th>"; 
          echo "<th>Erantzun okerra 2</th>"; 
          echo "<th>Erantzun okerra 3</th>"; 
          echo "<th>Gai arloa</th>";
          echo "</tr>";

          while($ilara = mysqli_fetch_array($er)){
            echo "<tr>"; 
            echo "<th>".$ilara['eposta']."</th>";
            echo "<th>".$ilara['galdera']."</th>";
            echo "<th>".$ilara['erantzunZuzena']."</th>";
            echo "<th>".$ilara['erantzunOkerra1']."</th>";
            echo "<th>".$ilara['erantzunOkerra2']."</th>";
            echo "<th>".$ilara['erantzunOkerra3']."</th>";
            echo "<th>".$ilara['zailtasuna']."</th>";
            echo "<th>".$ilara['gaiarloa']."</th>";
          }
          echo "</table>";
          mysqli_free_result($er);
        }
        else{
          echo "Ez dago ezer taulan";
        }
      }
      else{
        echo "Arazoak egon dira, ezin izan da taula lortu.";
      }
      mysqli_close($esteka);
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
