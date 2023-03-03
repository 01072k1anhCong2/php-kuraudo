<?php
//DB接続
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

//おみじくの名称を取得
$omikujiName = $_POST["omikuji_name"];

//データをDBに入れる
$sql = "";
$sql .= " INSERT INTO omikuji ";
$sql .= " ( name, created) ";
$sql .= " values ";
$sql .= " ('$omikujiName', NOW())";

$pdo->query($sql);

echo json_encode(true);

