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
     <div class="navbar-header">
      <a class="navbar-brand" href="login.php">ログイン</a>
      <a class="navbar-brand" href="select_nologin.php">ブックマーク一覧</a>
     </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<legend >ブックマーク詳細</legend>
<form method="post" action="update.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
      <div class="form-group">
        <label class="control-label col-sm-2">タイトル：</label>
          <div class="col-sm-4">
            <?=$rs["title"]?>
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL：</label>
          <div class="col-sm-4">
            <?=$rs["url"]?>
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ：</label>
          <div class="col-sm-4">
            <?=$rs["memo"]?>
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
