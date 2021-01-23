<?php
// 0. SESSION開始！！
session_start();

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。

//if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
//    exit('LOGIN ERROR!!!!!');
//} else {
//    // SESSION IDがチェックできた場合
//    // SESSION ID
//   session_regenerate_id(true);
//    $_SESSION['chk_ssid'] = session_id();
//}


//１．関数群の読み込み
require_once("funcs.php");
//loginCheck();


//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table2");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail_public.php?id=' . $result['id'] . '">';
        $view .=  $result["bookname"];
        $view .= '</a>';

    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブックマーク表示（一般公開）</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">ブックマーク登録へ</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
   　<legend>ブックマーク表示（一般公開）</legend>
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>
