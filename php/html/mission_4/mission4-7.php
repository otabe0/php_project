<?php
  // connection
  $dsn = 'mysql:dbname=bltdb;host=mysql_server';
  $user = 'root';
  $password = 'passwd';
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  // update
  $id = 1; //変更する投稿番号
  $name = "otabe";
  $comment = "test_test";
  $sql = 'update tbtest set name=:name,comment=:comment where id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  // select
  $sql = 'SELECT * FROM tbtest';
  $stmt = $pdo->query($sql);
  $results = $stmt->fetchAll();
  foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
    echo $row['id'].',';
    echo $row['name'].',';
    echo $row['comment'].'<br>';
  echo "<hr>";
  }
?>
