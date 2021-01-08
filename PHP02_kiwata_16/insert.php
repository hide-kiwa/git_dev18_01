<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$bookname = $_POST['bookname'];
$bookurl = $_POST['bookurl'];
$naiyou = $_POST['naiyou'];

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  //$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
  $pdo = new PDO('mysql:dbname=kiwa_db;charset=utf8;host=localhost','root','root');//dbname変更、パスワード省く  
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
//$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyou, indate)VALUES(NULL, :name, :email, :text, sysdate())");
$stmt = $pdo->prepare("INSERT INTO gs_bm_table2(id,bookname,bookurl,naiyou,indate)VALUES(NULL, :bookname, :bookurl, :naiyou, sysdate())");//テーブル名変更、項目名変更


//  2. バインド変数を用意
//$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':text', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  項目変更
$stmt->bindValue(':bookurl',  $bookurl,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou',   $naiyou,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');


}
?>
