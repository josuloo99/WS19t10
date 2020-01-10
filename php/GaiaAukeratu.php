<?php
  session_start();
  if(!isset($_SESSION)){
    echo "<script>
            alert('Ezin duzu hemen sartu');
            window.location.back();
            </script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../js/jquery-3.4.1.min.js"></script>
  <?php include '../html/Head.html'?>
</head>
<body onload="gaiakEkarri()">
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php include 'DbConfig.php' ?>
  <h2>Jolastera zoaz! Aukeratu gai bat eta horren inguruko galderak agertuko zaizkizu.</h2>
  <form action="Jolastera.php" name="gaia" method="POST">
    <select name="aukerak" id="gaiak"></select>
    <input type="submit" name="submit" value="Aukeratu!">
  </form>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
<script type="text/javascript">
  function gaiakEkarri(){
    $.ajax({
      url: "gaiakEkarri.php",
      type: "POST",
      dataType: "JSON",
      success: function(response){
        for (var i = 0; i < response.length; i++){
          $("#gaiak").append('<option value='+response[i]+'> '+response[i]+'</option>'); 
        }
      }
    }).fail( function() {
        console.log("errorea");
    });
  }
</script>
</html>