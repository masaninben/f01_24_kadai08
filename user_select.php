<?php
session_start();
//0.外部ファイル読み込み
include('functions.php');
chk_ssid();

//1.  DB接続します
// include('functions.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM '.$table2);
$status = $stmt->execute();

//３．データ表示
if($_SESSION['kanri_flg'] != 0){
   $menu = '<a class="navbar-brand" href="user_index.php">ユーザー登録</a><a class="navbar-brand" href="user_select.php">ユーザー一覧</a>';
}else{
   header('Location: login.php');
};


$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  errorMsg($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="user_detail.php?id='.$result["id"].'">';
    $view .= $result["name"]." : ".$result["lid"]." : ".$result["lpw"];
    $view .= '</a>';
    $view .= '  ';
    $view .= '<a href="user_delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマークアプリ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
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
<legend >ユーザー一覧</legend>
<div>
    <div class="container jumbotron">
     <p>name : lid : lpw</p>
     <?=$view?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
