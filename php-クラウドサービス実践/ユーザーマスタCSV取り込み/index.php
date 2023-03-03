<?php
# DBを読み込む
include("database.php");

$sql = " SELECT * FROM user_masters WHERE deleted_at is NULL";

//検索条件を取得
$name = isset($_GET["name"]) ? $_GET["name"] : "";     //名前
$genderMale = isset($_GET["gender_male"]) ? $_GET["gender_male"] : 0;     //男性
$genderFemale = isset($_GET["gender_female"]) ? $_GET["gender_female"] : 0; //女性
$genderOther = isset($_GET["gender_other"]) ? $_GET["gender_other"] : 0;  //その他
$jobFirm = isset($_GET["job_firm"]) ? $_GET["job_firm"] : 0;  //会社員
$jobPublic = isset($_GET["job_public"]) ? $_GET["job_public"] : 0;  //公務員
$jobStudent = isset($_GET["job_student"]) ? $_GET["job_student"] : 0;  //学生
$jobCompany = isset($_GET["job_company"]) ? $_GET["job_company"] : 0;  //自営業
$jobOther = isset($_GET["job_other"]) ? $_GET["job_other"] : 0;  //その他
$area = isset($_GET["area"]) ? $_GET["area"] : 0;  //出身エリア

//名前を絞り込む
if($name <> "") {
    $sql .= " AND name LIKE '%$name%' ";
}

//性別：男性に絞り込む
$checkFlg = false;
if($genderMale == 1 || $genderFemale == 1 || $genderOther == 1) {
    $sql .= " AND ( ";

    if($genderMale == 1) {
        $sql .= " gender = 1 ";
        $checkFlg = true;
    }
    //性別：女性に絞り込む
    if($genderFemale == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " gender = 2 ";
        $checkFlg = true;
    }
    //性別：その他に絞り込む
    if($genderOther == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " gender = 0 ";
    }
    $sql .= " ) ";
}

$checkFlg = false;
if($jobFirm == 1 || $jobPublic == 1 || $jobStudent == 1 || $jobCompany == 1 || $jobOther == 1) {
    $sql .= " AND (";

    //職業：会社員
    if($jobFirm == 1) {
        $sql .= " job_id = 1";
        $checkFlg = true;
    } 
    //職業：公務員
    if($jobPublic == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " job_id = 2";
        $checkFlg = true;
    } 
    //職業：学生
    if($jobStudent == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " job_id = 3";
        $checkFlg = true;
    } 
    //職業：自営業
    if($jobCompany == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " job_id = 4";
        $checkFlg = true;
    } 
    //職業：その他
    if($jobOther == 1) {
        $sql .= $checkFlg ? " OR " : "";
        $sql .= " job_id = 5";
        $checkFlg = true;
    } 
    $sql .= ")";
}

$checkFlg = false;
if($area != 0) {
    $sql .= " AND area = $area ";
}

$results = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script>
            //新規作成ページに遷移
            function moveNewPage()
            {
                location.href = "create.php";
            }
        </script>
        <style>
            th {
                background: skyblue;
                padding: 5px 20px;
            }
        </style>
    </head>
    <body>
        <form action="index.php" method="get" />
        名前：<input type="text" name="name" /><br>
        性別：<input type="checkbox" name="gender_male" value="1" />&nbsp;男性&nbsp;&nbsp;
        <input type="checkbox" name="gender_female" value="1" />&nbsp;女性&nbsp;&nbsp;
        <input type="checkbox" name="gender_other" value="1" />&nbsp;その他&nbsp;&nbsp;<br>
        職業：<input type="checkbox" name="job_firm" value="1" />&nbsp;会社員&nbsp;&nbsp;
        <input type="checkbox" name="job_public" value="1" />&nbsp;公務員&nbsp;&nbsp;
        <input type="checkbox" name="job_student" value="1" />&nbsp;学生&nbsp;&nbsp;
        <input type="checkbox" name="job_company" value="1" />&nbsp;自営業&nbsp;&nbsp;
        <input type="checkbox" name="job_other" value="1" />&nbsp;その他&nbsp;&nbsp;<br>
        出身エリア：
        <select name="area">
            <option value="0">--</option>
            <option value="1">北海道</option>
            <option value="2">東北</option>
            <option value="3">関東</option>
            <option value="4">中部</option>
            <option value="5">近畿</option>
            <option value="6">中国</option>
            <option value="7">四国</option>
            <option value="8">九州沖縄</option>
        </select><br><br>
        <button type="submit">検索</button>
        <button type="button" onClick="moveNewPage();">新規登録</button>
        </form>
        <br><br>
        <table>
            <tr>
                <th>名前</th>
                <th>性別</th>
                <th>職業</th>
                <th>出身</th>
                <th>電話番号</th>
                <th></th>
            </tr>
            <?php while($row = $results->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row["name"];?></td>
                <td>
                    <?php
                        if($row["gender"] == 1) echo "男性";
                        if($row["gender"] == 2) echo "女性";
                        if($row["gender"] == 0) echo "その他";
                    ?>
                 </td>
                <td>
                    <?php
                        if($row["job_id"] == 1) echo "会社員";
                        if($row["job_id"] == 2) echo "公務員";
                        if($row["job_id"] == 3) echo "学生";
                        if($row["job_id"] == 4) echo "自営業";
                        if($row["job_id"] == 5) echo "その他";
                    ?>
                </td>
                <td>
                    <?php
                        if($row["area"] == 1) echo "北海道";
                        if($row["area"] == 2) echo "東北";
                        if($row["area"] == 3) echo "関東";
                        if($row["area"] == 4) echo "中部";
                        if($row["area"] == 5) echo "近畿";
                        if($row["area"] == 6) echo "中国";
                        if($row["area"] == 7) echo "四国";
                        if($row["area"] == 8) echo "九州沖縄";
                    ?>
                </td>
                <td><?= $row["phone_number"];?></td>
                <td>
                    <a href="">編集</a>&nbsp;
                    <a href="">削除</a>
                </td>
            </tr>
            <?php endwhile;?>
        </table>
    </body>
</html>
