<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!-- 登録 -->
<?php require 'db-connect.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

// 曲名が空でないか確認
if (empty($_POST['music_name'])) {
    echo '曲名が空です';
} else if (empty($_POST['category'])) {
    echo 'アーティスト名が空です';
} else if (empty($_POST['picture'])) {
    echo '動画リンクが空です';
} else {
    try {
        // プリペアドステートメントの準備
        $sql = $pdo->prepare('INSERT INTO Music (music_name, category, picture) VALUES (?, ?, ?)');

        // パラメータをバインド
        $sql->bindParam(1, $_POST['music_name'], PDO::PARAM_STR);
        $sql->bindParam(2, $_POST['category'], PDO::PARAM_STR);
        $sql->bindParam(3, $_POST['picture'], PDO::PARAM_STR);
        // $sql->bindParam(4, $_POST['URL'], PDO::PARAM_STR);

        // クエリの実行
        if ($sql->execute()) {
            echo 'データが正常に挿入されました<br>';
            require 'home.php'; 
        } else {
            echo 'データの挿入中にエラーが発生しました';
        }
    } catch (PDOException $e) {
        echo 'データベースエラー：' . $e->getMessage();
    }
}
?>
