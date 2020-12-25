<?php

$datas = array(); // 配列の初期化

// ファイルを開く
$openFile = fopen("./data/data.txt", "r");

// ファイル内容を1行ずつ読み込んで出力
while($line = fgets($openFile)){
    $datas[] = json_decode($line,true);
    //echo nl2br($line);
}
// ファイルを閉じる
fclose($openFile);


print("<pre>");
print_r($datas);
print("</pre>");

?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>アンケート</title>
    </head>
    
    <body>
        
        <!-------------------------------  データを読み込んだままの表  -------------------------------------->
        
        アンケート結果<br>
        <table>
            <tr>
                <th>名前</th><th>メールアドレス</th><th>好きな食べ物</th><th>好きな音楽</th><th>好きな本</th><th>行ってみたい国</th><th>登録日時</th>
            </tr>
            
        <?php foreach($datas AS $data){ ?>
            <tr>
                <td><?php echo $data['name']; ?></td><td><?php echo $data['mailaddress']; ?></td><td><?php echo $data['food']; ?></td><td><?php echo $data['music']; ?></td><td><?php echo $data['book']; ?></td><td><?php echo $data['country']; ?></td><td><?php echo $data['time']; ?></td>
            </tr>
        <?php }?>
        </table>
        
        
        
        
        <!--------------------------------  データを並べ替えた表１  ------------------------------------------>
        並べ替え(名前)<br>
        
        <?php
        // 並べ替え処理
        foreach ((array) $datas as $key => $value) {
            $sort[$key] = $value['name'];  // 並べ替え項目の指定
        }
        if($datas){
            array_multisort($sort, SORT_ASC, $datas);  // 並べ替え実行
        }
        
        print("<pre>");
        print_r($datas);
        print("</pre>");
        
        ?>
        
        <table>
            <tr>
                <th>名前</th><th>メールアドレス</th><th>好きな食べ物</th><th>好きな音楽</th><th>好きな本</th><th>行ってみたい国</th><th>登録日時</th>
            </tr>
        <?php foreach($datas AS $data){ ?>
            <tr>
                <td><?php echo $data['name']; ?></td><td><?php echo $data['mailaddress']; ?></td><td><?php echo $data['food']; ?></td><td><?php echo $data['music']; ?></td><td><?php echo $data['book']; ?></td><td><?php echo $data['country']; ?></td><td><?php echo $data['time']; ?></td>
            </tr>
        <?php }?>
        </table>



        <!--------------------------------  データを並べ替えた表２  ------------------------------------------>
        並べ替え(音楽)<br>

        <?php
        
        // 並べ替え処理
        foreach ((array) $datas as $key => $value) {
            $sort[$key] = $value['music'];  // 並べ替え項目の指定
        }
        if($datas){
            array_multisort($sort, SORT_ASC, $datas);  // 並べ替え実行
        }
        
        print("<pre>");
        print_r($datas);
        print("</pre>");

        ?>

        <table>
            <tr>
                <th>名前</th><th>メールアドレス</th><th>好きな食べ物</th><th>好きな音楽</th><th>好きな本</th><th>行ってみたい国</th><th>登録日時</th>
            </tr>
        <?php foreach($datas AS $data){ ?>
            <tr>
                <td><?php echo $data['name']; ?></td><td><?php echo $data['mailaddress']; ?></td><td><?php echo $data['food']; ?></td><td><?php echo $data['music']; ?></td><td><?php echo $data['book']; ?></td><td><?php echo $data['country']; ?></td><td><?php echo $data['time']; ?></td>
            </tr>
        <?php }?>

        </table>
        
        
        <style>
            table,th,td{
                border:1px solid #000;
            }
        </style>
        
    </body>
</html>








