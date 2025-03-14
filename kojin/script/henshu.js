$(document).ready(function() {
    // 初期表示時にすでに値があるかどうかをチェックし、値がある場合はactiveクラスを追加
    $('input').each(function() {
        if ($(this).val()) {
            $(this).parent().find('label').addClass('active');
        }
    });

    // フォーカスイン時の処理
    $('input').on('focusin', function() {
        $(this).parent().find('label').addClass('active');
    });
  
    // フォーカスアウト時の処理
    $('input').on('focusout', function() {
        if (!this.value) {
            $(this).parent().find('label').removeClass('active');
        }
    });
});
