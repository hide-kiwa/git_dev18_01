<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];
//２．データ登録SQL作成 gs_an_table->gs_bm_table2
$stmt = $pdo->prepare('DELETE FROM gs_bm_table2 WHERE id = :id');
// ↓追加
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute();
//３．データ表示
if ($status == false) {
    sql_error($status);
} else {
    redirect('select.php');
}