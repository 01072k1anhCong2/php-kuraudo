<?php
session_start();

//セッションがなければNG
if (!isset($_SESSION["email"])) {
    echo "NGです！";
    die;
}

# データベースの値を取得する
$pdo = new PDO(
    //DB情報
    'mysql:host=localhost;dbname=tsb;charset=utf8',
    //ID(ユーザ名)
    'master',
    //パスワード
    'master'
);

# データベースから情報を持ってくる
$sql = "";
$sql .= " SELECT * FROM drinks ";

?>
<html>
    <head>
        <title></title>
        <style>
            table {
                background: black;
                margin: 0 auto;
            }
            th {
                background: yellow;
            }
            td {
                background:white;
                padding: 5px 15px;
            }
        </style>
    </head>
    <body>
        <div style="text-align: center;">
            在庫管理<br><br>
            <table>
                <tr>
                    <th>商品</th>
                    <th>価格</th>
                    <th>在庫</th>
                </tr>
<?php
    $results = $pdo->query($sql);
    while($row = $results->fetch(PDO::FETCH_ASSOC)):
?>
                <tr>
                    <td><?= $row["type"];?></td>
                    <td><input type="number" value="<?= $row['price'];?>">円</td>
                    <td><input type="number" value="<?= $row['stock'];?>"></td>
                </tr>
<?php
    endwhile;
?>
            </table><br>


            <form action="logout.php">
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </body>
</html>