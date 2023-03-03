<?php
# データベースの値を取得する
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

# データ取得
$email = $_POST["login_id"];
$pass = $_POST["login_pass"];

# SQLでデータを照合
$sql = "";
$sql .= " SELECT * FROM customers_01 ";
$sql .= " WHERE ";
$sql .= " email = '$email' ";
$sql .= " AND ";
$sql .= " password = '$pass' ";

$results = $pdo->query($sql);

while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    //セッションを使うことを宣言
    session_start();
    $_SESSION["email"] = $row["email"];

    echo "ログイン成功";
    header("Location: admin.php");
    die;
}

echo "ログイン失敗";
header("Location: sign_in.php");
die;




