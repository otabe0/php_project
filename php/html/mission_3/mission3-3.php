<html>
<meta charset="utf-8">
<form action="" method="post">
  <input type="text" name="name" placeholder="input name">
  <input type="text" name="comment" placeholder="コメント">
  <input type="submit" value="送信"><br>
  <input type="text" name="delete_id" placeholder="削除したいIDを入力">
  <input type="submit" value="削除">
</form>
<body>
<?php
  $filepath = "./mission3-1.txt";
  // データがセットされているか
  // 空でないか
  if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    // ファイル読み込み
    if(file_exists($filepath))
      # 読み込む際, 改行を取り除く & 空行はスキップする
      $arr = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    else
      $arr = array();

    // 配列がempty() ならID=1のレコードをfileに保存
    // otherwise 最終行を取得しid+1のレコードをfileに保存
    if(empty($arr))
      file_put_contents($filepath, "1<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."\n", FILE_APPEND);
    else{
      //最終行を取得
      $fin = explode("<>", array_pop($arr));
      // ファイル書き込み
      file_put_contents($filepath, (string)((int)$fin[0]+1)."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."\n", FILE_APPEND);
    }
    // ファイル読み込み
    $contents = file($filepath);
    // ファイルの中身を表示
    foreach ($contents as $line) {
      echo implode(" ", explode("<>", $line))."<br>";
    }
    //echo implode("<br>", explode("\n",file_get_contents($filepath)));
  }
  elseif(!empty($_POST["delete_id"])){
    if(file_exists($filepath)){
      // 配列取得
      $contents = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      // テキストファイルの中身を削除 ファイルサイズを0にしてファイルポインタを先頭に移動する
      $fp = fopen($filepath, 'w');
      fclose($fp);
      // 配列ごとの処理
      foreach ($contents as $line) {
        $record = explode("<>", $line);
        if($_POST["delete_id"] != $record[0]){
          file_put_contents($filepath, $record[0]."<>".$record[1]."<>".$record[2]."<>".$record[3]."\n", FILE_APPEND);
        }
      }
    }
  }
?>
</body>
</html>

