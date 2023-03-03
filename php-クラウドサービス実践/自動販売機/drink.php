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
$sql .= " SELECT * FROM drinks ORDER BY id ";

$results = $pdo->query($sql);




?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <script src="js/jquery.js"></script>
        <title></title>
        <style>
            td {
                text-align: center;
                padding: 5px 10px;
            }
        </style>
        <script>
            function calc(name, price)
            {
                //var nyukin = document.getElementById("nyukin").value
                var nyukin = $("#nyukin").val()

                //おつりの計算（入金額 - 販売額）
                var otsuri = nyukin - price;

                //おつりが0円以上ある場合
                if(otsuri >= 0) {
                    //おつり
                    alert(name + "を購入しました！おつりは" + otsuri + "円です。" );
                }else{
                    alert("金額が足りません！");
                    return false;
                }

                //データを送信する
                document.getElementById("name").value = name;
                document.sendData.submit();

            }
        </script>
    </head>
    <body>
        <form name="sendData" method="post" action="purchase.php">
            <!-- 購入した商品名を一時的に入れる箱-->
            <input type="hidden" id="name" name="name" />
        </form>
        <table>
            <tr>
                <td colspan="4">
                    入金：<input type="number" id="nyukin" /><br><br>
                </td>
            </tr>
            <tr>
<?php
    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
?>
                <td>
<?php
        if($row["stock"] > 0 ) {            
?>
                <button onclick="calc('<?= $row['type'];?>', <?= $row['price'];?>)"><?= $row["type"];?></button>
                <br><?= $row["price"];?>円
                <br>在庫：<?= $row["stock"];?>
<?php
        }else{
?>
                    <button disabled><?= $row["type"];?></button>
                    <br><?= $row["price"];?>円
                    <br>在庫：<?= $row["stock"];?>
<?php
        }
?>
                </td>
<?php
    }
?>
            </tr>
        </table>
    </body>
</html>

