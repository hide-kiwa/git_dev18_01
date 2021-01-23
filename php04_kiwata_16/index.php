<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select_public.php">ブックマーク表示(公開)</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select.php">ブックマーク表示(要ログイン)</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン画面へ</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウトする</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク登録</legend>
     <label>名前：<input type="text" name="bookname"></label><br>
     <label>URL：<input type="text" name="bookurl"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>

</html>
