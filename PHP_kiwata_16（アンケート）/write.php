<?php

$datas = array(); // 配列の初期化

// kadai.htmlのinputの値を受け取る 
$datas = [
               'name'        => $_POST['name'],
               'mailaddress' => $_POST['mailaddress'],
               'food'        => $_POST['food'],
               'music'       => $_POST['music'],
               'book'        => $_POST['book'],
               'country'     => $_POST['country'],
               'time'        => date('Y-m-d H:i:s'),
            ];

// ファイルに書き込み
$file = fopen('./data/data.txt', 'a');
fwrite($file, json_encode($datas) . "\n");
fclose($file);

print "ありがとうございました<br>";

print "<a href='read.php'>結果はこちら</a>";

