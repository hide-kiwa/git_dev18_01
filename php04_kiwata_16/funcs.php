<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = "gs_db4";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);//mampp用
        
        
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}


// ログインチェック処理 loginCheck()
function loginCheck() {
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
        exit('<a href="login.php">ログイン</a>してください');
    } else {
        // SESSION IDがチェックできた場合
        // SESSION IDを即座に更新する。
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
    
}
