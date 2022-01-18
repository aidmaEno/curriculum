<?php

require_once('db_connect.php');
require_once('function.php');

$userError = '';
$passError = '';
$okMessage = '';
$db_error = '';

if (isset($_POST["register"])) {
    if (empty($_POST["name"])) {
        $userError = 'ユーザー名が未入力です。';
    } elseif (empty($_POST["password"])) {
        $passError = 'パスワードが未入力です。';
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
        $pdo = db_connect();

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name',$name);
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $stmt->bindParam(':password',$password_hash);
            $stmt->execute();
            $okMessage = 'ユーザーの登録が完了しました。';
        } catch (PDOException $e) {
            $db_error = 'データベースエラー';
        }
    }
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <font color="ACFF84"><?php echo htmlspecialchars($okMessage, ENT_QUOTES); ?></font><br>
    <h1>ユーザー新規登録</h1>
    <form action="register.php" method="post">
        <input placeholder="ユーザー名" type="text" name="name" id="name" style="width: 250px; height: 30px">
        <br>
        <input placeholder="パスワード" type="password" name="password" id="password" style="width: 250px; height: 30px; margin-top: 15px;">
        <br>
        <input class="button" type="submit" value="新規登録" name="register" id="register">

        <font color="red"><?php echo htmlspecialchars($userError, ENT_QUOTES); ?></font><br>
        <font color="red"><?php echo htmlspecialchars($passError, ENT_QUOTES); ?></font><br>
        <font color="red"><?php echo htmlspecialchars($db_error, ENT_QUOTES); ?></font><br>
    </form>
    
    <style>
        .button {
            display:block;
            margin-top: 15px;
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