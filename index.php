<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>一行掲示板</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>一行掲示板</h1>
  <form action="post.php" method="POST">
    <label>
      名前
      <input name="name" maxlength="20">
    </label>
    <label>
      投稿
      <input name="post" maxlength="255">
    </label>
    <button type="submit">送信</button>
  </form>
  <hr>
<?php
  $sql = new mysqli("localhost", "simplebbs", /* PASSWORD */, "simplebbs");
  if($sql->connect_error){
    echo $sql->connect_error;
    exit();
  }else{
    $sql->set_charset("utf8");
    $s = "SELECT id, name, post, created FROM post";
    if($result = $sql->query($s)){
      echo("<dl>");
      while ($row = $result->fetch_assoc()) {
?>
        <dt><?= $row["name"]?></dt>
        <dd><?= $row["post"]?></dd>
        <dd><?= $row["created"]?></dd>
<?php
      }
      echo("</dl>");
      $result->close();
    }
    $sql->close();
  }
?>
</body>
</html>