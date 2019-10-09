<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
  
    Irudirik gabeko galdera baten datuak erabiltzaileak sar ditzan <br/>
      beharrezkoa den formularioa eta scriptak (gidoia/k) gehitu
    
    </div>
  <form onsubmit="return ../js/ValidateFieldsQuestion.js" action="AddQuestion.php" method="get">
  <p>E-posta:</p>
  <input type="text" name="eposta" required>
  <p>Galdera:</p>
  <input type="text" name="galdera" required>
  <p>Erantzun zuzena:</p>
  <input type="text" name="erantzunZuzena" required>
  <p>Erantzun okerra:</p>
  <input type="text" name="erantzunOkerra1" required>
  <p>Erantzun okerra:</p>
  <input type="text" name="erantzunOkerra2" required>
  <p>Erantzun okerra:</p>
  <input type="text" name="erantzunOkerra3" required>
  <br>
  <p>Aukeratu galderaren zailtasuna</p>
  <input type="radio" name="zailtasuna" value="Erraza"> Male<br>
  <input type="radio" name="zailtasuna" value="Ertaina"> Female<br>
  <input type="radio" name="zailtasuna" value="Zaila"> Other
    
  <br>
  <p>Gai-arloa:</p>
  <input type="text" name="gaiarloa" required>
  <br>
  <input type="submit" value="Bidali">
  </form>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>