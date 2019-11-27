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
  <?php
  session_destroy();
	?>
<script type="text/javascript">
        alert("Agur! Beste bat arte!");
        window.location.assign("Layout.php");
</script>
<?php include '../html/Footer.html' ?>
</body>
</html>