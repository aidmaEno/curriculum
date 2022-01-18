<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();
$pdo = db_connect();

try {
    $sql = "SELECT * FROM books ORDER BY date ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error :' . $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainページ</title>
</head>
<body>
    <h2>在庫一覧画面</h2>
    <div>
        <button class="btn1" onclick="location.href='create_book.php'">新規登録</button>
        <button class="btn2" onclick="location.href='logout.php'">ログアウト</button><br>
    </div>
        <table>
            <tr>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th> </th>
            </tr><br>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><button class="btn3" onclick="location.href='delete_post.php?id=<?php echo $row['id'] ?>'">削除</button></td><br>
                </tr>
            <?php } ?>
        </table>

        <style>
            div {
                display: block;
            }
            table {
                margin-top: -70px;
                text-align: center;
                border-collapse: collapse;
                width: 700px;
                height: 300px;
            }
            table th, table td {
              border: solid 1px #cccccc;
            }
            table th {
                background-color: #e3e3e3;
            }
            .btn1 {
                border: none;
                width:100px;
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
            .btn1:hover {
                background:#1260db;
                color: #cccccc;
            }
            .btn2 {
                border: none;
                margin-left: 15px;
                width:100px;
                height:40px;
                font-size: 15px;
                background-color:#9e9e9e;
                color:#ffffff;
                border-radius:5px;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
            }
            .btn2:hover {
                background:#7a7a7a;
                color: #cccccc;
            }
            .btn3 {
                border: none;
                width:60px;
                height:40px;
                background:#cf4646;
                text-align:center;
                color:#FFFFFF;
                font-size:15px;
                font-weight:bold;
                border-radius:5px;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
            }
            .btn3:hover {
                background:#b03c3c;
                color: #cccccc;
            }


        </style>
    
</body>
</html>