<?php
require_once('funcs.php');

//1. POSTデータ取得
$bookname   = $_POST["bookname"];
$bookurl  = $_POST["bookurl"];
$naiyou = $_POST["naiyou"];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成 gs_an_table->gs_bm_table2
$stmt = $pdo->prepare("INSERT INTO gs_bm_table2(bookname,bookurl,naiyou,indate)VALUES(:bookname,:bookurl,:naiyou,sysdate())");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    header("Location: index.php");
    exit();
}
?>
