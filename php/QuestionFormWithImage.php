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
    <div>
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
  <form action="AddQuestionWithImage.php" method="post" enctype = "multipart/form-data" id="galderenF" name="galderenF" onSubmit="return egiaztatu()">
  <label>E-posta:</label>
  <input type="text" name="eposta" id="eposta" value="<?php echo htmlspecialchars($user); ?>"  readonly="true">
  <br><br>
  <label>Galdera:</label>
  <input type="text" name="galdera">
  <br><br>
  <label>Erantzun zuzena:</label>
  <input type="text" name="erantzunZuzena">
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra1">
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra2">
  <br><br>
  <label>Erantzun okerra:</label>
  <input type="text" name="erantzunOkerra3">
  <br><br>
  <label>Aukeratu galderaren zailtasuna:</label>
  <input type="radio" name="zailtasuna" value="1" checked> Minimoa
  <input type="radio" name="zailtasuna" value="2"> Ertaina
  <input type="radio" name="zailtasuna" value="3"> Handia
  <br><br>
  <label>Gai-arloa:</label>
  <input type="text" name="gaiarloa">
  <br><br>
  <label>Irudia</label>
  <input type="file" name="irudia" id="irudia" accept="image/*" onchange="preview_image(event)">
  <br>
  <p id="irudierror" span class="error"></p>
  <img id="output_image"/>
  <br><br>
  <input type="submit" name="submit" value="Bidali">
  </form>
 
   
    
    </div>
   </section>
   
  <?php include '../html/Footer.html' ?>

</body>

</html>