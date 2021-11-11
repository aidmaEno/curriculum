<link rel="stylesheet" href="css/style.css">

<?php
$my_name = $_POST["my_name"];
//result.phpに名前を渡す
session_start();
$_SESSION['my_name'] = $my_name;
?>
<p style="font-size: 15px;">お疲れ様です<?php echo $my_name; ?>さん</p>

<div>
    <form action="result.php" method="post">
        <h3>①ネットワークのポート番号は何番？</h3>
            <!-- 配列をループで表示 -->
            <?php
            $p_number = ["80","22","20","21"];
            foreach($p_number as $value) {
                echo "<input type=\"radio\" name=\"p_number\" value=\"{$value}\"";
                echo ">";
                echo $value;
            }
            ?>
        
        <h3>②Webページを作成するための言語は？</h3>
            <!-- 配列をループで表示 -->
            <?php
            $langue = ["PHP","Python","JAVA","HTML"];
            foreach($langue as $value) {
                echo "<input type=\"radio\" name=\"langue\" value=\"{$value}\"";
                echo ">";
                echo $value;
            }
            ?>

        <h3>③MySQLで情報を取得するためのコマンドは？</h3>
            <!-- 配列をループで表示 -->
            <?php
            $mysql_db = ["join","select","insert","update"];
            foreach($mysql_db as $value) {
                echo "<input type=\"radio\" name=\"mysql_db\" value=\"{$value}\"";
                echo ">";
                echo $value;
            }
            ?>

        <p><input type="submit" value="回答する"></p>
    </form>
</div>
