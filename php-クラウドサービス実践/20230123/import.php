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

$name = $_FILES["csv_file"]["name"];
$temp = $_FILES["csv_file"]["tmp_name"];


$extension = substr($name,-3);
if($extension != "csv"){
    echo "NG";
    die;
}


$data = data("YmdHis");
$uploadPath = "uploaded/$data.$extension";


move_uploaded_file($temp, $uploadPath);


$fp = fopen($uploadPath, "r");

while($data = fgetcsv($fp)){
    mb_convert_variables("UTF-8","SJIS-win",$data);

    $name = $data[0];
    $gender = $data[1];
    $job = $data[2];
    $area = $data[3];
    $tel = $data[4];
}



fclose($fp);
