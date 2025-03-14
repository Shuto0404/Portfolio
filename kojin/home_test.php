<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>曲一覧</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/home.css"> -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>
<body>
    <button class="button-002" onclick="location.href='touroku.php'">新しい曲を追加</button>
    <button class="button-002" onclick="location.href='touroku_category.php'">今あるカテゴリーに曲を追加</button>

    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->query('SELECT * FROM Music');
        echo '<table id="example" class="display" style="width:100%">';
echo '<thead><tr><th>曲名</th><th>アーティスト</th><th>画像</th><th>URL</th><th>操作</th><th>削除</th></tr></thead>';
echo '<tbody>'; // ここに追加
foreach ($sql as $row) {
    echo '<tr>';
    echo '<td>', htmlspecialchars($row['music_name']), '</td>';
    echo '<td>', htmlspecialchars($row['category']), '</td>';
    echo '<td>', htmlspecialchars($row['picture']), '</td>';
    echo '<td>', htmlspecialchars($row['URL']), '</td>';
    //更新ボタン
    echo '<td>';
    echo '<form action="henshu.php" method="post">';
    echo '<input type="hidden" name="music_id" value="' . $row['music_id'] . '">';
    echo '<button type="submit">更新</button>';
    echo '</form>';
    echo '</td>';
    // 削除ボタン
    echo '<td>';
    echo '<form action="delete.php" method="post">';
    echo '<input type="hidden" name="music_id" value="' . $row['music_id'] . '">';
    echo '<button type="submit">削除</button>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}
echo '</tbody>'; // ここに追加
echo '</table>';

    ?>
    <script>
        // DataTableの初期化
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
