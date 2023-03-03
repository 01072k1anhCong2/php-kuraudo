<?php
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

//商品名
$name = $_POST["name"];

$sql = "";
$sql .= " SELECT * FROM drinks WHERE type = '$name'";

$results = $pdo->query($sql);

$stock = 0;
while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    $stock = $row["stock"];
}

//在庫を一つ減らす
$stock = $stock - 1;

$sql = "";
$sql .= " UPDATE drinks SET stock = $stock WHERE type = '$name'";

$pdo->query($sql);

header("Location: drink.php");