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
  <section class="main" id="s1">
   <?php include 'DbConfig.php' ?>
    <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <div id="taula">
  <?php if (isset($_SESSION['eposta']) && $_SESSION['mota'] == 'ikasle')
    $user = $_SESSION['eposta'];
      else
        echo "<script>
                  alert('Ez zaude baimenduta hona sartzeko.');
                  window.history.back();
              </script>";
  ?>
    <?php
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
          echo "<th>Erantzun okerra 1</th>"; 
          echo "<th>Erantzun okerra 2</th>"; 
          echo "<th>Erantzun okerra 3</th>"; 
		      echo "<th>Zailtasuna</th>"; 
          echo "<th>Gai arloa</th>";
		      echo "<th>Irudia</th>";
          echo "</tr>";

          while($ilara= mysqli_fetch_array($er, MYSQLI_ASSOC)){
            echo "<tr>"; 
           // echo "<th>".$ilara['eposta']."</th>";
            echo "<td>".$ilara['galdera']."</td>";
            echo "<td>".$ilara['erantzunZuzena']."</td>";
            echo "<td>".$ilara['erantzunOkerra1']."</td>";
            echo "<td>".$ilara['erantzunOkerra2']."</td>";
            echo "<td>".$ilara['erantzunOkerra3']."</td>";
            echo "<td>".$ilara['zailtasuna']."</td>";
            echo "<td>".$ilara['gaiarloa']."</td>";
			      if($ilara['irudia'] != null) {
      				echo '<td><img style="height:200px;max-widtd:200" src="data:irudia/jpeg;base64,'.base64_encode( $ilara['irudia'] ).'"/></td>';
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
    ?>
  </section>
 
  <?php include '../html/Footer.html' ?>
</body>
</html>
