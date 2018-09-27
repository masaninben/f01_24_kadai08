<?php
$id = $_GET["id"];
// echo "GET:".$id;

//2. DB接続します
include('functions.php');
$pdo = db_conn();

//３．SELECT
$stmt = $pdo->prepare('SELECT * FROM '. $table .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt);
}else{
   $rs = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマークアプリ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
     <legend >更新ページ</legend>
      <div class="form-group">
        <label class="control-label col-sm-2">タイトル：</label>
          <div class="col-sm-4">
            <input type="text" name="title" class="form-control" value="<?=$rs["title"]?>">
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL：</label>
          <div class="col-sm-4">
            <input type="text" name="url" class="form-control" value="<?=$rs["url"]?>">
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ：</label>
          <div class="col-sm-4">
            <textarea name="memo" rows="3" cols="50"><?=$rs["memo"]?></textArea>
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <input type="submit" value="登録" class="btn btn-success">
          </div>
      </div>
      <!-- idは変えたくない = ユーザーから見えないようにする-->
     <input type="hidden" name="id" value="<?=$rs['id']?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
