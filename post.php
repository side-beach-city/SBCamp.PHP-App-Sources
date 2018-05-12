<?php
  $sql = new mysqli("localhost", "simplebbs", /* PASSWORD */, "simplebbs");
  if($sql->connect_error){
    echo $sql->connect_error;
    exit();
  }else{
    $sql->set_charset("utf8");
    // 本来であれば、$_POSTが空だったとき(直接post.phpを呼ばれた時)に対処する必要がある
    $name = $_POST["name"];
    $post = $_POST["post"];
    // 本来であれば、無害化(サニタイジング)をしていない値をそのままデータベースに書き込んではいけない。
    // XSSやSQLインジェクションに繋がる恐れがある。
    $s = "INSERT INTO post (name, post) VALUES ('$name', '$post');";
    $res = $sql->query($s);
    header("location: /");

    $sql->close();
  }
?>