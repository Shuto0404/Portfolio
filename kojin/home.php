<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>曲一覧</title>
   
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
    <button class="button-002" onclick="location.href='touroku.php'">新しい曲を追加</button>
    <button class="button-002" onclick="location.href='touroku_category.php'">今あるカテゴリーに曲を追加</button>
    <div class="setumei">
    操作説明<br>
    ・左上のセレクトボックスで1ページに表示される曲数を選択できる<br>
    ・曲名とアーティストの横の矢印で名前順にできる<br>
    ・右下の数字でページ移動ができる<br>
    ・右のボックスで検索ができる
    </div>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->query('SELECT * FROM Music');
        echo '<table id="example" class="display" style="width:100%">';
        echo '<thead><tr>';
        echo '<th>曲名</th>';
        echo '<th>アーティスト</th>';
        echo '<th></th>';
        // echo '<th>URL</th>';
        echo '<th>編集</th>';
        echo '<th>削除</th>';
        '</tr></thead>';
        echo '<tbody>';

        foreach ($sql as $row) {
            echo '<tr>';
            echo '<td>', htmlspecialchars($row['music_name']), '</td>';
            echo '<td>', htmlspecialchars($row['category']), '</td>';
            echo '<td class="td_video">';
            echo '<iframe width="300" height="168.75" src="' . htmlspecialchars($row['picture']) . '" frameborder="0" allowfullscreen></iframe>';
            // echo htmlspecialchars($row['picture']);
            echo '</td>';
//427 240 
            // echo '<td>', htmlspecialchars($row['URL']), '</td>';
            // 更新ボタン
            echo '<td>';
            echo '<form action="henshu.php" method="post">';
            echo '<input type="hidden" name="music_id" value="' . $row['music_id'] . '">';
            echo '<button type="submit">編集</button>';
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
        echo '</tbody>';
        echo '</table>';
    ?>

    <script>
        // DataTableの初期化
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [ [5, 10, 20, 30], [5, 10, 20, 30] ],
                // "order": [[0, "asc"], [1, "asc"]], // 曲名を優先的にソートし、次にアーティストをソート
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [2, 3, 4] } // 画像、URL、操作、削除の列をソート対象外に
                ]
            });
        });


    </script>
</body>
</html>
