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

# bbs のデータを取得

$sql = '';
$sql .= ' SELECT ';
$sql .= ' * ';
$sql .= ' FROM ';
$sql .= ' memos ';

$results = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    button{background-color: black;color:#F0FFFF;}
</style>
<body style="text-align: center;">
<br><br>
<form action="add.php" name = "form" method = "post">
<textarea name="memo" rows="4" cols="50"></textarea>
<button>投稿</button>
</form>
<br>
<!-- show results -->
<table border="1" style="margin:0 auto; width: 500px;">
<tr>
<th>テキスト</th>
<th>日付</th>
<th>削除</th>
</tr>
<?php while($row = $results->fetch(PDO::FETCH_ASSOC)):?>
<tr>
<td><?= $row['memo'];?></td>
<td><?= $row['created'];?></td>
<td>
<a href="delete.php?id=<?= $row['id']; ?>" onclick=" return checkAlert()">削除</a>
</td>


</td>
</tr>
<?php endwhile;?>
</table>
</body>
</html>