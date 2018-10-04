<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();

if($_SESSION['kanri_flg'] != 0){
   $menu = '<a class="navbar-brand" href="user_index.php">ユーザー登録</a><a class="navbar-brand" href="user_select.php">ユーザー一覧</a>';
}else{
   header('Location: login.php');
};
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
        <a class="navbar-brand" href="index.php">ブックマーク登録</a>
        <a class="navbar-brand" href="select.php">ブックマーク一覧</a>
        <?=$menu?>
        <a class="navbar-brand" href="logout.php">ログアウト</a>
       </div> 
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<legend >ユーザー登録</legend>
<form method="post" action="user_insert.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
      <div class="form-group">
        <label class="control-label col-sm-2">ユーザーネーム：</label>
          <div class="col-sm-4">
            <input type="text" name="name" class="form-control" >
          </div>
      </div> 
      <div class="form-group">
        <label class="control-label col-sm-2">ログインID：</label>
          <div class="col-sm-4">
            <input type="text" name="lid" class="form-control" >
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">パスワード：</label>
          <div class="col-sm-4">
            <input type="text" name="lpw" class="form-control">
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">一般は０、管理者は１：</label>
          <div class="col-sm-4">
            <input type="text" name="kanri_flg" class="form-control">
            <!-- <input type="radio" name="kanri_flg" value="0" checked="checked">一般
            <input type="radio" name="kanri_flg" value="1" >管理者 -->
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">通常は０、退会は１：</label>
          <div class="col-sm-4">
            <input type="text" name="life_flg" class="form-control" >
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <input type="submit" value="登録" class="btn btn-success">
          </div>
      </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
