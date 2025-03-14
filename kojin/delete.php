<?php require 'db-connect.php'; ?>

<?php
    $pdo = new PDO($connect, USER, PASS);
    $musicId = $_POST['music_id'];
    $sql = $pdo->prepare('DELETE FROM Music WHERE music_id = ?');
    $sql->execute([$musicId]);
    echo '曲を削除しました。<br>';
    require 'home.php';
?>
