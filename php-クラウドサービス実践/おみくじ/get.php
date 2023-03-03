<?php
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

//おみくじテーブルから全データを取得
$results = $pdo->query(" SELECT * FROM omikuji ORDER BY created DESC");

//データを配列に入れなおす
$data = [];
while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);
