<?php require 'db-connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href=css/touroku_category.css rel='stylesheet' type='text/css'>
   
</head>
<body>
    <h2 class="title">登録画面</h2><br>
    <div class="setumei">
    操作説明<br>
    ・曲名を入力する<br>
    ・既に登録してあるアーティストから選択する<br>
    ・動画リンクはYoutubeの動画共有から<br>
    　埋め込むを選択してhttpsから始まる<br>
    　リンクをコピーして貼り付ける
    </div>
    <div class="wrap">
    <form action="home_insert.php" method="post">
       
        <div>
            <label for="fname">曲名</label>
            <input type="text"  id="fname" name="music_name" class="cool"/>
        </div>
        <div class="selectbox-2">
        <!-- <label class="selectbox-2"> -->
        <select name="category" id="slc"><!-- カテゴリの選択 -->
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = $pdo->query('SELECT DISTINCT category FROM Music');
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
            }
            ?>
        </select>
        <!-- </label> -->
        </div>
        <div>
            <label for="email">動画リンク</label>
            <input type="text"  id="email" name="picture" class="cool"/>
        </div>
   
        <button class="sousin">登録</button>
    </form>
    </div>
    <br><br>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="script/touroku_category.js"></script>
</body>
</html>
