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
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
     <legend >ユーザー登録</legend>
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
