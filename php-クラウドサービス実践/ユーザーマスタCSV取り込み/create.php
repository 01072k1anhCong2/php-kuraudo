<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="insert.php" method="post">
            名前：<input type="text" name="name" /><br>
            性別：<input type="radio" name="gender" value="1" />&nbsp;男性
            <input type="radio" name="gender" value="2" />&nbsp;女性
            <input type="radio" name="gender" value="0" />&nbsp;その他<br>
            職業：
            <select name="job">
                <option value="0">--</option>
                <option value="1">会社員</option>
                <option value="2">公務員</option>
                <option value="3">学生</option>
                <option value="4">自営業</option>
                <option value="5">その他</option>
            </select><br>
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
            </select><br>
            電話番号：<input type="text" name="phone_number" />
            <br><br>
            <button>登録</button>
        </form>

    </body>
</html>
