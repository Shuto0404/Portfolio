<?php require 'db-connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href=css/touroku.css rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="script/touroku.js"></script>
</head>
<body>

    <h2>登録画面</h2><br>
    <div class="setumei">
    操作説明<br>
    ・曲名とアーティスト名を入力する<br>
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
            <div>
                <label for="lname">アーティスト名</label>
                <input type="text"  id="lname" name="category" class="cool"/>
            </div>
            <div>
                <label for="email">動画リンク</label>
                <input type="text"  id="email" name="picture" class="cool"/>
            </div>
            <!-- 動画URL<input type="text" name="URL" ><br> -->
    
        <button class=sousin>登録</button>
        </form>
    </div>
</body>
</html>