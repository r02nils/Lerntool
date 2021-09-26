<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lerntool</title>
    <meta name="application-name" content="Lerntool">
    <meta name="author" content="Nils Rothenbühler">
    <link rel="stylesheet" href="css/master.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
      <h1>Resultat</h1>
      <?php
      session_start();
      echo "Punkte: ".$_SESSION["points"]."/10";
      ?>
      <br>
      <br>
      <a href="index.php"><button type="button" name="button">Zurück zum Start</button></a>
    </div>
  </body>
</html>
