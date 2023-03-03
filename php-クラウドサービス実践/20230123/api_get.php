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


$sql = "SELECT * FROM tweets ";

$results = $pdo->query($sql);

$data = [];
while($row = $results->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);
?>