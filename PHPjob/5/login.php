<?php
require_once('db_connect.php');
require_once('function.php');

session_start();

if (!empty($_POST)) {
    if (empty($_POST["name"])) {
        echo "ユーザー名が未入力です。";
    }
    if (empty($_POST["password"])) {
        echo "パスワードが未入力です。";
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
        $pass = htmlspecialchars($_POST["password"],ENT_QUOTES);

        $pdo = db_connect();

        try {
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            die();
        }

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($pass, $row["password"])) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];

                header("Location: index.php");
                exit;
            } else {
                echo "ユーザー名またはパスワードに誤りがあります。";
            }
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
    <div>
        <h2>ログイン画面</h2>
        <button class="btn" onclick="location.href='register.php'">新規ユーザー登録</button>
    </div>
    <form action="" method="post"><br>
        <input placeholder="ユーザー名" type="text" name="name" id="name" style="width: 250px; height: 30px;"><br>
        <input placeholder="パスワード" type="password" name="password" id="password" style="width: 250px; height: 30px; margin-top: 15px;"><br>
        <input class="button" type="submit" value="ログイン"><br>
    </form>
    
    <style>
        div {
            display: flex;
            height: 50px;
        }
        .btn {
            display:block;
            margin-left: 10px;
            margin-top: 15px;
            width:120px;
            height:40px;
            background:#3DB5B3;
            text-align:center;
            color:#FFFFFF;
            font-size:12px;
            font-weight:bold;
            border-radius:5px;
            -webkit-border-radius:5px;
            -moz-border-radius:5px;
        }
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