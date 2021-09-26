<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lerntool</title>
    <meta name="application-name" content="Lerntool">
    <meta name="author" content="Nils Rothenbühler">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
      <h1>Lerntool</h1>
      <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="submit" name="start" value="Start">
      </form>
    </div>
  </body>
</html>

<?php
if(isset($_POST['start'])){
  session_start();
  $_SESSION["points"] = 0; //Session Variable, um Punkte zu speichern.
  header("Location: learning.php?sentence=1"); //startet mit dem Satz 1
}
?>
