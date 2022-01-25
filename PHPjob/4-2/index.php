<?php

require_once 'getData.php';
require_once 'pdo.php';

connect();


try {
    $data = new getData();
    $getpostdata = $data->getPostData();
    $getuserdata = $data->getUserData();
    
} catch (PDOException $e) {
    die('取得できませんでした。'. $error->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>記事一覧ページ</title>
</head>
<body>
    <div class="container">
            <div class="curriculum_logo">
                <img src="image/curriculum_logo.png" alt="カリキュラム_logo">
            </div>
        <div class="welcome">ようこそ<?php echo $getuserdata['last_name'].$getuserdata['first_name'];?>さん</div>
        <div class="last_login">最終ログイン日 : <?php echo $getuserdata['last_login'];?></div>
    </div>

        <table>
            <tr id="title">
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th><br>
            </tr>

            <?php foreach ($getpostdata as $row):?>
                <tr id="contents">
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['category_no'];?></td>
                    <td><?php echo $row['comment'];?></td>
                    <td><?php echo $row['created'];?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    <div class="company_name">Y&I group.inc</div>
</body>
</html>