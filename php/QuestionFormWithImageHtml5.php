<!DOCTYPE html>
<html lang="eu">
<head>
 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <?php include '../html/Head.html'?>
  <style>
  form .error {
  color: #ff0000;
  </style>
}
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
  
    Irudirik gabeko galdera baten datuak erabiltzaileak sar ditzan <br/>
      beharrezkoa den formularioa eta scriptak (gidoia/k) gehitu
    
    </div>
  <form action="AddQuestionWithImage.php" method="get" id="galderenF" name="galderenF">
  <label>E-posta:</label>
  <input type="email" name="eposta" id="eposta" pattern="([a-z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es)))|([a-z]+\.?[a-z]*@ehu\.((eus)|(es)))" required>
  <br><br>
  <label>Galdera:</label>
  <input type="text" name="galdera" pattern=".{10,}"required>
  <br><br>
  <label>Erantzun zuzena:</label>
  <input type="text" name="erantzunZuzena" required>
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra1" required>
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra2" required>
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra3" required>
  <br><br>
  <label>Aukeratu galderaren zailtasuna:</label>
  <input type="radio" name="zailtasuna" value="1"> Minimoa
  <input type="radio" name="zailtasuna" value="2"> Ertaina
  <input type="radio" name="zailtasuna" value="3"> Handia
    
  <br><br>
  <label>Gai-arloa:</label>
  <input type="text" name="gaiarloa" required>
  <br><br>
  <label>Irudia</label>
  <input type="file" name="irudia">
  <br><br>
  <input type="submit" value="Bidali">
  </form>
  </section>
  <?php include '../html/Footer.html' ?>

</body>
</html>
