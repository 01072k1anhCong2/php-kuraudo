<?php
# DBを読み込む
include("database.php");

//データを取得
$name = $_POST["name"];    //名前
$gender = $_POST["gender"];  //性別
$job = $_POST["job"];  //職業
$area = $_POST["area"];  //出身エリア
$tel = $_POST["phone_number"];  //電話番号

$sql = "";
$sql .= " INSERT INTO user_masters ( ";
$sql .= " name, gender, job_id, area, phone_number, created_at, updated_at";
$sql .= " ) values ( ";
$sql .= " '$name', ";    //名前
$sql .= " $gender, ";    //性別
$sql .= " $job, ";       //職業
$sql .= " $area, ";    //出身
$sql .= " '$tel', ";    //電話番号
$sql .= " NOW(), ";    //created_at
$sql .= " NOW() ";    //updated_at
$sql .= " ) ";

//echo $sql;die;
$pdo->query($sql);

header("Location: index.php");




