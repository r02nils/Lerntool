
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
      <h1> Satz <?php echo (empty($_POST['num']) !== true)?($_POST['num']."/10"):""; ?></h1>
      <?php
      if(empty($_POST['answer']) !== true){ //Überprüft, ob eine Antwort eingegeben wurde.
        if((isset($_POST['btn'])) && ($_POST['answer'] != "")){ //Führt den Code nur aus, wenn auf den Button gedruckt wird.
          $content = file_get_contents("data/data.json"); //Nimmt die Datei und ladet sie in die Variable content
          $data = json_decode($content, true); //dekodiert die Datei, zu einem Array
          $i = $_POST['num'];
          $answer = $_POST['answer'];
          $correct = $data[$i]['correct']; //nimmt die Lösung, für den aktuellen Satz

          if($answer == $correct){
            $data[$i]['sentenceWithGap'] = str_replace('__________', "<span class='correct'>$answer</span>", $data[$i]['sentenceWithGap']); //Ersetzt die Lücke, mit der richtigen Antwort.
            echo $data[$i]['sentenceWithGap'];
            echo "<p class='correct'>richtig!</p>";
            session_start();
            $_SESSION["points"] = $_SESSION["points"] + 1;
          }
          else{
            $data[$i]['sentenceWithGap'] = str_replace('__________', "<span class='wrong'>$answer <span class='correct'>[$correct]</span></span>", $data[$i]['sentenceWithGap']); //Ersetzt die Lücke, mit der falschen Antwort und der korrekten Lösung.
            echo $data[$i]['sentenceWithGap'];
            echo "<p class='wrong'>falsch!</p>";
          }
        }
      }
      else{
        echo "ERROR";
        $_POST['num'] = 1;
        $data = array();
      }

       ?>
      <form <?php echo (($_POST['num']+1) > count($data))?"hidden":""; ?> class="" action="learning.php" method="get">
        <input type="text" name="sentence" value="<?php echo $_POST['num']+1 ?>" hidden readonly>
        <input class="button" type="submit" name="" value="weiter">
      </form>

      <form <?php echo (($_POST['num']+1) > count($data))?"":"hidden"; ?> class="" action="result.php" method="post">
        <input class="button" type="submit" name="" value="Resultat">
      </form>
    </div>
  </body>
</html>
