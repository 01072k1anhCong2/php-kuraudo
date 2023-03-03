<?php
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

$sql = "";
$sql .= " SELECT ";
$sql .= " name, ";
$sql .= " count(id) as total ";
$sql .= " FROM ";
$sql .= " omikuji ";
$sql .= " GROUP BY ";
$sql .= " name ";

$results = $pdo->query($sql);

//配列に直してjsonエンコードして送信
$data = [];
while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

header("Content-Type: application/json; charaset=utf-8");
echo json_encode($data);
