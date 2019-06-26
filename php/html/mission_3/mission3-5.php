<?php
  $flag = False;
  $filepath = "./mission3-5.txt";

  function print_data($fpath){
    // ファイル読み込み
    $contents = file($fpath);
    // ファイルの中身を表示
    foreach ($contents as $line) {
      echo implode(" ", explode("<>", $line))."<br>";
    }
  }

  // 編集
  if(!empty($_POST["edit_id"])){
    $contents = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($contents as $line){
      $record = explode("<>", $line);
      if($_POST["edit_id"] == $record[0]){
        if($_POST["edit_passwd"] == $record[4]){
          $edit_name = $record[1];
          $edit_comment = $record[2];
        }
        else{
          $_POST["edit_id"] = NULL;
          $flag = True;
          break;
        }
      }
    }
  }
?>

<html>
<h1>簡易掲示板</h1>
<meta charset="utf-8">
<form action="" method="post">
  <?php if (!empty($_POST["edit_id"])) : ?>
    <input type="hidden" name="id" value="<?php echo $_POST["edit_id"] ?>">
  <?php endif ?>
  <input type="text" name="name" placeholder="input name" value="<?php if(!empty($_POST["edit_id"])) echo $edit_name?>">
    <input type="text" name="comment" placeholder="コメント" value="<?php if(!empty($_POST["edit_id"])) echo $edit_comment ?>">
  <input type="text" name="passwd" placeholder="input passwd">
  <input type="submit" value="送信"><br>
  <input type="text" name="edit_id" placeholder="input edit id">
  <input type="text" name="edit_passwd" placeholder="input passwd">
  <input type="submit" value="編集"><br>
  <input type="text" name="delete_id" placeholder="input delete id">
  <input type="text" name="delete_passwd" placeholder="input passwd">
  <input type="submit" value="削除">
</form>
</html>

<?php
  echo gettype($_POST["name"]);
  if($flag) echo "passwdが違います<br>";
  // 空でないか
  if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    // post idが空でないなら編集, otherwise 新規投稿
    if (!empty($_POST["id"])){
      $contents = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      // file delete
      $fp = fopen($filepath, 'w');
      fclose($fp);
      $flag = True;
      // 配列ごとの処理
      foreach ($contents as $line) {
        $record = explode("<>", $line);
        if($_POST["id"] == $record[0])
          file_put_contents($filepath, $record[0]."<>".$_POST["name"]."<>".$_POST["comment"]."<>".$record[3]."<>".$record[4]."\n", FILE_APPEND);
        else
          file_put_contents($filepath, $record[0]."<>".$record[1]."<>".$record[2]."<>".$record[3]."<>".$record[4]."\n", FILE_APPEND);
      }
      print_data($filepath);
    }
    else{
      // ファイル読み込み
      if(file_exists($filepath))
        # 読み込む際, 改行を取り除く & 空行はスキップする
        $arr = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      else
        $arr = array();

      // 配列がempty() ならID=1のレコードをfileに保存
      // otherwise 最終行を取得しid+1のレコードをfileに保存
      if(empty($arr))
        file_put_contents($filepath, "1<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<>".$_POST["passwd"]."\n", FILE_APPEND);
      else{
        //最終行を取得
        $fin = explode("<>", array_pop($arr));
        // ファイル書き込み
        file_put_contents($filepath, (string)((int)$fin[0]+1)."<>".$_POST["name"]."<>".$_POST["comment"]."<>".date("Y/m/d H:i:s")."<>".$_POST["passwd"]."\n", FILE_APPEND);
      }
      // ファイル読み込み
      $contents = file($filepath);
      // ファイルの中身を表示
      foreach ($contents as $line) {
        echo implode(" ", explode("<>", $line))."<br>";
      }
    }
  } // 削除
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
        if($_POST["delete_id"] == $record[0]){
          if($_POST["delete_passwd"] != $record[4]){
            $flag = True;
            file_put_contents($filepath, $record[0]."<>".$record[1]."<>".$record[2]."<>".$record[3]."<>".$record[4]."\n", FILE_APPEND);
          }
        }
        else{
              file_put_contents($filepath, $record[0]."<>".$record[1]."<>".$record[2]."<>".$record[3]."<>".$record[4]."\n", FILE_APPEND);
        }
      }
      if($flag) echo "passwdが違います<br>";
      print_data($filepath);
    }
  }
?>


