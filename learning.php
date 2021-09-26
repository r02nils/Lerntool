<?php
if(empty($_GET['sentence']) !== true){
  $i = $_GET['sentence']; //Nimmt die Nummer des aktuellen Satzes
  $content = file_get_contents("data/data.json"); //Nimmt die Datei und ladet sie in die Variable content
  $data = json_decode($content, true); //dekodiert die Datei, zu einem Array
  if($i <= count($data)){
    $data[$i]['sentenceWithGap'] = str_replace('__________', '<input type="text" name="answer" required autofocus>', $data[$i]['sentenceWithGap']); //Ersetzt die Lücke mit einem Input
  }
}
else{
  $i = 0;
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lerntool</title>
    <meta name="application-name" content="Lerntool">
    <meta name="author" content="Nils Rothenbühler">
    <link rel="stylesheet" href="css/master.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content">
      <h1>Satz <?php echo $_GET['sentence']."/".count($data); ?></h1>
      <form class="" action="check.php" method="post">
        <p><?php echo (empty($data[$i]['sentence'])!==true)?$data[$i]['sentence']:""; ?></p>
        <p><?php echo (empty($data[$i]['sentenceWithGap'])!==true)?$data[$i]['sentenceWithGap']:""; ?></p>
        <textarea name="num" rows="1" cols="1" readonly hidden><?php echo $i; ?></textarea>
        <input class="button" type="submit" name="btn" value="prüfen">
      </form>
    </div>

  </body>
</html>
