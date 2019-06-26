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
      if($_POST["comment"] == "完成!" || $_POST["comment"] == "完成！") file_put_contents("./mission_2-2.txt", "おめでとう！<br>");
      else file_put_contents("./mission_2-2.txt", $_POST["comment"]."を受け付けました<br>");
      echo file_get_contents("./mission_2-2.txt");
    }
  }
?>
</body>
</html>


