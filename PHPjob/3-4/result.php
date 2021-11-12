<link rel="stylesheet" href="css/style.css">

<?php
session_start();
$my_name = $_SESSION["my_name"];
$p_number = $_POST["p_number"];
$langue = $_POST["langue"];
$mysql_db = $_POST["mysql_db"];
?>

<p><?php echo $my_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<p><?php
    if ($p_number == 80) {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>
<p>②の答え</p>
<p><?php
    if ($langue == "HTML") {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>
<p>③の答え</p>
<p><?php
    if ($mysql_db == "select") {
        echo "正解！";
    } else {
        echo "残念・・・";
    }
    ?></p>