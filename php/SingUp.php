<!DOCTYPE html>
<html lang="eu">
<head>
 
  <script src="../js/jquery-3.4.1.min.js"></script>
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

  <form action="" method="get" id="erregistroa" enctype = "multipart/form-data" name="erregistroa">
  <label>E-posta:</label>
  <input type="email" name="eposta" id="eposta" pattern="([a-z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es)))|([a-z]+\.?[a-z]*@ehu\.((eus)|(es)))" required>
  
  <br><br>

  <label>Aukeratu erabiltzaile mota:</label>
  <input type="radio" name="erabiltzailemota" value="ikasle"> Ikaslea
  <input type="radio" name="erabiltzailemota" value="irakasle"> Irakaslea


  <label>Izen abizenak:</label>
  <input type="text" name="izenabizen" pattern=".+\s.+(\s.+)*"required>
  <br><br>

  <label>Pasahitza:</label>
  <input type="password" name="pasahitza" required>
  <br><br>

  <label>Pasahitza errepikatu:</label>
  <input type="password" name="pasahitza2" required>
  <br><br>

  <label>Argazkia:</label>
  <input type="file" name="irudia">
  <br><br>

  <input type="submit" value="Bidali">
  </form>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
