

<?php
$id = $_GET['id'];

// echo $id;
// die;

$sql = "";
$sql .= " DELETE FROM memos ";
$sql .= " WHERE id = $id";


$pdo = new PDO(
    'mysql:host=localhost;dbname=tsb;charset=utf8',

    'master',
    '01072k1anhCONG@'
);

$pdo->query($sql);

 header("location: index.php");