<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
  .list{
    margin:10px;
  }
  </style>
</head>
<body>
<div class="container jumbotron">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">TODOアプリ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->

<form method="post" action="insert.php">
     <label><textArea name="title" rows="1" cols="40"></textArea></label><br>
     <input type="submit" value="追加">
</form>
<?php
//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=todo;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM lists");
$status = $stmt->execute();

//３．データ表示
// $view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<table class="list">
    <tr>
    <td>□<?= $result['title'] ?></td>
    <td>
      <a href="delete.php?id=<?= $result['id'] ?>">×</a>
    </td>
    </tr>
</table>
<?php
  }

}
?>





</div>
<!-- Main[End] -->


</body>
</html>

