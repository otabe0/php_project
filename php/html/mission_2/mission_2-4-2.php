<html>
<meta charset="utf-8">
<form action="" method="post">
  <input type="text" name="comment" value="コメント">
  <input type="submit" value="送信">
</form>
<body>
<?php
  if(isset($_POST["comment"])){
    if($_POST["comment"] != ""){
      if($_POST["comment"] == "完成!" || $_POST["comment"] == "完成！") file_put_contents("./mission_2-2.txt", "おめでとう！<br>", FILE_APPEND);
      else file_put_contents("./mission_2-2.txt", $_POST["comment"]."を受け付けました<br>", FILE_APPEND);
      $contents = @file("mission_2-2.txt");
      foreach ($contents as $line) {
        $array[] = $line;
      }
      foreach ($array as $word) {
        echo $word;
      }
    }
  }
?>

<?php
  
?>
</body>
</html>


