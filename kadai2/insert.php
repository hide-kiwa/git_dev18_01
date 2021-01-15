<?php
require_once('funcs.php');

//1. POSTデータ取得
$name               = $_POST["name"];
$lid                = $_POST["lid"];
$lpw                = $_POST["lpw"];
$kanri_flg          = $_POST["kanri_flg"];
$life_flg           = $_POST["life_flg"];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(
name,
lid,
lpw,
kanri_flg,
life_flg,
modified,
created
)VALUES(
:name,
:lid,
:lpw,
:kanri_flg,
:life_flg,
sysdate(),
sysdate()
)");


$stmt->bindValue(':name',      h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',       h($lid),  PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',       h($lpw),  PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg',  h($life_flg), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    header("Location: select.php");
    exit();
}
?>
