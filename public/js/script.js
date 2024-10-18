$(function () {
  // アコーディオンメニューの処理
  $(".nav-btn").on("click", function () {
    $(this).next().slideToggle(300);
    $(this).toggleClass("open", 300);
  });

  // 投稿の編集モーダル処理
  $('.js-modal-open').on('click', function () {
    $('.js-modal').fadeIn();

    var post = $(this).attr('post'); // 投稿内容を取得
    var post_id = $(this).attr('post_id'); // 投稿IDを取得


    $('.modal_post').text(post); // モーダル内の投稿内容に設定
    $('.modal_id').val(post_id); // モーダル内の投稿IDに設定

    return false; // デフォルトのリンク動作を無効化
  });

  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut(); // モーダルを閉じる
    return false;
  });

  // ここから削除ボタンの処理
  $('.js-delete-btn').on('click', function (event) {
    event.preventDefault(); // デフォルトのリンク動作を無効化

    var deleteUrl = $(this).attr('href'); // 削除するURLを取得

    // カスタム削除モーダルを表示
    $('.js-confirm-modal').fadeIn();

    // OKボタンがクリックされたら削除を実行
    $('.confirm-ok').on('click', function () {
      window.location.href = deleteUrl; // 削除の実行
    });

    // キャンセルボタンがクリックされたらモーダルを閉じる
    $('.confirm-cancel').on('click', function () {
      $('.js-confirm-modal').fadeOut(); // モーダルを閉じる
    });

    return false;
  });

  // モーダル外クリック時にモーダルを閉じる処理
  $(window).on('click', function (event) {
    if ($(event.target).is('.js-confirm-modal')) {
      $('.js-confirm-modal').fadeOut();
    }
  });
});
