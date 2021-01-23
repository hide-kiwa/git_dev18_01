<?php
session_start();
$id = $_GET["id"]; //?id~**を受け取る
require_once("funcs.php");
loginCheck();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table2 WHERE id = ' . $id . ';');
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧へ</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
			<fieldset>
			<legend>詳細(編集できます)</legend>
			<label>名前：<input type="text" name="bookname" value="<?= $row['bookname'] ?>"></label><br>
			<label>URL：<input type="text" name="bookurl" value="<?= $row['bookurl'] ?>"></label><br>
			<label><textArea name="naiyou" rows="4" cols="40" ><?= $row['naiyou'] ?></textArea></label><br>
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<input type="submit" value="送信">
			</fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
