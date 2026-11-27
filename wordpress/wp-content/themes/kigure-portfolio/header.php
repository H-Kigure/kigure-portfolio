<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link" href="#main">本文へ移動</a>

    <header class="site-header<?php echo is_front_page() ? '' : ' detail-header'; ?>" data-header>
      <a class="wordmark" href="<?php echo esc_url(is_front_page() ? '#top' : home_url('/')); ?>" aria-label="H.kigure ポートフォリオ ホーム">
        <span>HK</span><i>.</i>
      </a>
      <?php if (is_front_page()) : ?>
        <button class="menu-button" type="button" aria-expanded="false" aria-controls="global-nav">
          <span class="menu-label">MENU</span>
          <span class="menu-lines" aria-hidden="true"><i></i><i></i></span>
        </button>
        <nav class="global-nav" id="global-nav" aria-label="メインナビゲーション">
          <a href="#works"><span>01</span>制作物</a>
          <a href="#services"><span>02</span>対応範囲</a>
          <a href="#skills"><span>03</span>スキル</a>
          <a href="#career"><span>04</span>経歴</a>
          <a href="#contact"><span>05</span>連絡先</a>
        </nav>
      <?php else : ?>
        <nav class="detail-nav" aria-label="戻る">
          <a href="<?php echo esc_url(home_url('/#works')); ?>"><span aria-hidden="true">←</span> 制作物一覧</a>
        </nav>
      <?php endif; ?>
    </header>
