<?php
get_header();
?>
<main class="wp-content-page" id="main">
  <p class="content-kicker">404 / Not Found</p>
  <h1>ページが見つかりません。</h1>
  <p>URLが変更されたか、ページが削除された可能性があります。</p>
  <div class="not-found-links"><a class="text-link" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る <span aria-hidden="true">→</span></a></div>
</main>
<?php
get_footer();
