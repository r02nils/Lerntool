<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lerntool</title>
    <meta name="application-name" content="Lerntool">
    <meta name="author" content="Nils Rothenbühler">
    <link rel="stylesheet" href="css/master.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
      <h1>Resultat</h1>
      <?php
      $content = file_get_contents("data/data.json"); //Nimmt die Datei und ladet sie in die Variable content
      $data = json_decode($content, true); //dekodiert die Datei, zu einem Array
      session_start();
      echo "Punkte: ".$_SESSION["points"]."/".count($data);
      ?>
      <br>
      <br>
      <a href="index.php"><button type="button" name="button">Zurück zum Start</button></a>
    </div>
  </body>
</html>
