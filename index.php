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
<form method="post" action="insert.php" class="form-horizontal">
  <div class="jumbotron ">
   <fieldset>
     <legend >ブックマーク登録</legend>
      <div class="form-group">
        <label class="control-label col-sm-2">タイトル：</label>
          <div class="col-sm-4">
            <input type="text" name="title" class="form-control" >
          </div>
      </div> 
      <div class="form-group">   
        <label class="control-label col-sm-2">URL：</label>
          <div class="col-sm-4">
            <input type="text" name="url" class="form-control">
          </div>
      </div>
      <div class="form-group">   
        <label class="control-label col-sm-2">メモ：</label>
          <div class="col-sm-4">
            <textarea name="memo" rows="3" cols="50"></textArea>
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
