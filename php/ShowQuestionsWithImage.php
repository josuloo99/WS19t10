<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <div id="taula">
   <?php include 'DbConfig.php' ?>
    <?php
	if(isset($_GET['usr'])){
    $esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
      or die ("Errorea Dbra konektatzerakoan");

      $sql = "SELECT * FROM questions";
      if($er = mysqli_query($esteka, $sql)){
        if(mysqli_num_rows($er) > 0){
          echo "<table>"; 
          echo "<tr>"; 
      //    echo "<th>E-maila</th>"; 
          echo "<th>Galdera</th>"; 
          echo "<th>Erantzun zuzena</th>";
          echo "<th>Gai arloa</th>";
          echo "<th>Irudia</th>";
          echo "</tr>";

          while($ilara= mysqli_fetch_array($er, MYSQLI_ASSOC)){
            echo "<tr>"; 
           // echo "<th>".$ilara['eposta']."</th>";
            echo "<td>".$ilara['galdera']."</td>";
            echo "<td>".$ilara['erantzunZuzena']."</td>";
            echo "<td>".$ilara['gaiarloa']."</td>";
            if($ilara['irudia'] != null) {
              echo '<td><img style="height:100px;max-width:100" src="data:irudia/jpeg;base64,'.base64_encode( $ilara['irudia'] ).'"/></td>';
            }
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
	}
	else {
		echo "Kautotuta egon behar zara galderak ikusteko.";
	}
    ?>
    </div>
  </section>
 
  <?php include '../html/Footer.html' ?>
</body>
</html>
