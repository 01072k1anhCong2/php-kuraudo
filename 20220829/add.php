<?php
# データベースの値を取得する
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    '01072k1anhCONG@'
);

#データを取得
$memo = $_POST['memo'];     #ユーザ名           #内容
// print($memo);

# memo にデータを入れる
$sql = "";
$sql .= " INSERT INTO memos ( ";
$sql .= " memo, ";
$sql .= " created, ";
$sql .= " deleted ";
$sql .= " ) values (";
$sql .= " '$memo', ";
$sql .= " NOW(), ";
$sql .= " NOW() ";
$sql .= " ) ";
$sql .= "  ";

$pdo->query($sql);
//元のページにリダイレクトすること
header('Location: index.php');