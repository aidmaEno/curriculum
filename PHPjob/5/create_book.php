<?php
require_once('db_connect.php');
require_once('function.php');

check_user_logged_in();

if (isset($_POST['post'])) {
    if (empty($_POST['title'])) {
        echo "タイトルが未入力です。";
    } elseif (empty($_POST['date'])) {
        echo "発売日が未入力です。";
    } elseif (empty($_POST['stock'])) {
        echo "在庫数が選択されていません。";
    }

    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        $pdo = db_connect();

        try {
            $sql = "INSERT INTO books (title,date,stock) VALUES (:title,:date,:stock)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title',$title);
            $stmt->bindParam('date',$date);
            $stmt->bindParam('stock',$stock);
            $stmt->execute();
            header("Location: index.php");
        } catch (PDOException $e) {
            echo 'Error :' . $e->getMessage();
            die();
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
    <title>本  登録画面</title>
</head>
<body>
    <h2>本  登録画面</h2>
    <form action="" method="post">
        <input placeholder="タイトル" type="text" name="title" id="title" style="width: 250px; height: 30px;"><br>
        <input placeholder="発売日" type="date" name="date" id="date" style="width: 250px; height: 30px; margin-top: 15px;"><br>
        <h4>在庫数</h4><br>
        <input type="number" name="stock" style="width: 200px; height: 30px;">
        
        <input class="button" type="submit" value="登録" name="post">
    </form>

    <style>
        h4 {
            height: 10px;
        }
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