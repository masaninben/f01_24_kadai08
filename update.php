<?php
$id    = $_POST["id"];
$title = $_POST["title"];
$url   = $_POST["url"];
$memo  = $_POST["memo"];

//2. DB接続します
include('functions.php');
$pdo = db_conn();

//３．UPDATE
$sql ="UPDATE $table SET title=:title, url=:url, memo=:memo WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url',   $url,   PDO::PARAM_STR);
$stmt->bindValue(':memo',  $memo,  PDO::PARAM_STR);
$stmt->bindValue(':id',    $id,    PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  errorMsg($stmt);
}else{
  //５．select.phpへリダイレクト
  header("Location: select.php");
}
?>