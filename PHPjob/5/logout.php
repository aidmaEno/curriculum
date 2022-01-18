<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
</head>
<body>
    <h2>ログアウト画面</h2><br>
    <div>ログアウトしました</div><br>
    <input class="button" type="button" onclick="location.href='login.php'" value="ログイン画面"><br>

    <style>
        .button {
            display:block;
            margin-top: 20px;
            width:120px;
            height:40px;
            background:#126EFF;
            text-align:center;
            color:#FFFFFF;
            font-size:15px;
            font-weight:bold;
            border-radius:5px;
            -webkit-border-radius:5px;
            -moz-border-radius:5px;
        }
    </style>
</body>
</html>