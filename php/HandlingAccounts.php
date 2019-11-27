<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <script src="../js/ValidateFieldsQuestion.js"></script>
  <script src="../js/ShowImageInForm.js"></script>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <?php include '../html/Head.html'?>
  
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="taula">
	<?php if (isset($_SESSION['eposta']) && $_SESSION['mota'] == 'admin')
    $user = $_SESSION['eposta'];
      else{
        echo "<script>
                  alert('Ez zaude baimenduta hona sartzeko.');
                  window.history.back();
              </script>";
        exit();
      }

  	$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) 
      or die ("Errorea Dbra konektatzerakoan");

     $sql = "SELECT eposta, pasahitza, argazkia, state FROM users";
     
      if($er = mysqli_query($esteka, $sql)){
        if(mysqli_num_rows($er) > 0){
          echo "<table id='taula'>"; 
          echo "<tr>"; 
          echo "<th>Ezabatu</th>"; 
          echo "<th>Eposta</th>";?> 
          <th>Pasahitza (hash moduan)</th>
          <?php
          echo "<th>Egoera</th>";
          echo "<th>Irudia</th>";
          echo "</tr>";

          while($ilara= mysqli_fetch_array($er, MYSQLI_ASSOC)){
          	if($ilara['state'] == 0)
          		$egoera = 'Aktibo';
          	else
          		$egoera = 'Blokeatua';

          	$eposta = $ilara['eposta'];

            echo "<tr>"; 
           // echo "<th>".$ilara['eposta']."</th>";
            echo '<td><input type=button  value=ezabatu onclick=ezabatu("'. $eposta.'")>';
            echo "<td>".$eposta."</td>";
            echo "<td>".$ilara['pasahitza']."</td>";
            echo '<td> <input type=button value='.$egoera.' onClick=aldatu("'. $eposta.'","'.$egoera.'")></td>';
            if($ilara['argazkia'] != null) {
              echo '<td><img style="height:100px;max-width:100" src="data:argazkia/jpeg;base64,'.base64_encode( $ilara['argazkia'] ).'"/></td>';
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
<script type="text/javascript">
	function aldatu(eposta, egoera){
		$.ajax({
        type: "POST",
        url: "../php/ChangeState.php",
        data: "eposta=" + eposta + "&egoera=" + egoera,
        cache: false,
        error: function(e) {
            console.log("Errorea phprekin konektatzerakoan.", e);
        },
        success: function(response) {
            if (response != "er"){
               alert("Aldatu da erabiltzailearen egoera.");
            	 $("#taula").load(window.location + " #taula");
            }
        }
    });
	}

    function ezabatu(eposta){
    $.ajax({
        type: "POST",
        url: "../php/RemoveUser.php",
        data: "eposta=" + eposta,
        cache: false,
        error: function(e) {
            console.log("Errorea phprekin konektatzerakoan.", e);
        },
        success: function(response) {
            if (response != "er"){
              alert("Ezabatu da erabiltzailea.");
              $("#taula").load(window.location + " #taula");
            }
        }
    });
  }
</script>

</html>