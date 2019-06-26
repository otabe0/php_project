<?php
  // connection
  $dsn = 'mysql:dbname=bltdb;host=mysql_server';
  $user = 'root';
  $password = 'passwd';
  $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  // delete
  $id = 2;
  $sql = 'delete from tbtest where id=:id';
  $stmt = $pdo->prepare($sql);
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
