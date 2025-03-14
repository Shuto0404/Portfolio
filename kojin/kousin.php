<?php require 'db-connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新</title>
</head>
<body>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('update Music set music_name=?,category=?,picture=? where music_id=?');
        $sql->execute([$_POST['music_name'],$_POST['category'],$_POST['picture'],$_POST['music_id']]);

        echo '更新しました。<br>';
        require 'home.php';
    ?>
    <!-- <a href="home_show.php">ホームに戻る</a> -->
</body>
</html>