<?php
$id = $_GET["id"];

//2. DB接続します
include('functions.php');
$pdo = db_conn();

//３．UPDATE
$stmt = $pdo->prepare('DELETE FROM '. $table2 .' WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  errorMsg($stmt);
}else{
  //５．select.phpへリダイレクト
  header("Location: user_select.php");
}
?>