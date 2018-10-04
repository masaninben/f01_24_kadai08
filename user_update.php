<?php
$id    = $_POST["id"];
$name = $_POST["name"];
$lid   = $_POST["lid"];
$lpw  = $_POST["lpw"];
$kanri_flg   = $_POST["kanri_flg"];
$life_flg   = $_POST["life_flg"];

//2. DB接続します
include('functions.php');
$pdo = db_conn();

//３．UPDATE
$sql ="UPDATE $table2 SET name=:name, lid=:lid, lpw=:lpw , kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid',   $lid,   PDO::PARAM_STR);
$stmt->bindValue(':lpw',  $lpw,  PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg',    $kanri_flg,    PDO::PARAM_INT);
$stmt->bindValue(':life_flg',    $life_flg,    PDO::PARAM_INT);
$stmt->bindValue(':id',    $id,    PDO::PARAM_INT);
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