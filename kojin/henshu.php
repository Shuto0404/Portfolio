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
    <script type="text/javascript" src="script/henshu.js"></script>
</head>
<body>
    <h2>編集画面</h2><br>
    <div class="setumei">
    操作説明<br>
    ・曲名とアーティスト名を入力する<br>
    ・動画リンクはYoutubeの動画共有から<br>
    　埋め込むを選択してhttpsから始まる<br>
    　リンクをコピーして貼り付ける
    </div>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select * from Music where music_id=?');
        $sql->bindValue(1,$_POST['music_id'],PDO::PARAM_INT);
        $sql->execute();
        foreach($sql as $row){
            echo '<div class="wrap">';
            echo '<form action="kousin.php" method="post">';
            echo '<input type="hidden" name="music_id" value=',$row['music_id'],'">';
            echo '<div>
                    <label for="fname">曲名</label>
                    <input type="text" id="fname" class="active" name="music_name" value="',$row['music_name'],'">
                  </div>';
            echo '<div>
                    <label for="lname">アーティスト名</label>
                    <input type="text" id="lname" name="category" value="',$row['category'],'">
                  </div>';
            echo '<div>
                    <label for="email">動画リンク</label>
                    <input type="text" id="email" name="picture" value="',$row['picture'],'">
                  </div>';
            // echo '動画URL<input type="text" name="URL" value="',$row['URL'],'"><br>';
            echo '<button class=sousin>編集する</button>';
            echo '</form>';
            echo '</div>';
        }
    ?>
</body>
</html>