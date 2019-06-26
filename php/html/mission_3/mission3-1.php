<html>
<meta charset="utf-8">
<form action="" method="post">
  <input type="text" name="name" placeholder="input name">
  <input type="text" name="comment" placeholder="コメント">
  <input type="submit" value="送信">
</form>
<body>
<?php
  if(isset($_POST["name"]) && isset($_POST["comment"])){
    if($_POST["name"] != "" && $_POST["comment"] != ""){
      // ファイル読み込み
      $filepath = "./mission3-1.txt";
      if(file_exists($filepath))
        $arr = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      else
        $arr = array();

      // 配列がempty() ならID=1のレコードをfileに保存
      // otherwise 最終行を取得しid+1のレコードをfileに保存
      if(empty($arr))
        file_put_contents($filepath, "1<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."\n", FILE_APPEND);
      else{
        //最終行取得
        $fin = explode("<>", array_pop($arr));
        file_put_contents($filepath, (string)((int)$fin[0]+1)."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."\n", FILE_APPEND);
      }
      echo implode("<br>", explode("\n",file_get_contents($filepath)));
    }
  }
?>
</body>
</html>


