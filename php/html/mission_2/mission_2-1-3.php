<html>
<meta charset="utf-8">
<form action="" method="post">
  <input type="text" name="comment" value="コメント">
  <input type="submit" value="送信">
</form>
<body>
<?php
  if(isset($_POST["comment"])){
    echo $_POST["comment"]."を受け付けました";
  }
?>
</body>
</html>


