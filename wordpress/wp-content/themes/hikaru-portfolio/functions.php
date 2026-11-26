<?php

if (! defined('ABSPATH')) {
    exit;
}

function kigure_portfolio_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('align-wide');

    register_nav_menus([
        'primary' => __('メインナビゲーション', 'kigure-portfolio'),
    ]);
}
add_action('after_setup_theme', 'kigure_portfolio_setup');

function kigure_portfolio_asset_version(string $relativePath): string
{
    $path = get_theme_file_path($relativePath);

    return file_exists($path) ? (string) filemtime($path) : wp_get_theme()->get('Version');
}

function kigure_portfolio_enqueue_assets(): void
{
    wp_enqueue_style(
        'kigure-portfolio-main',
        get_theme_file_uri('/assets/css/styles.css'),
        [],
        kigure_portfolio_asset_version('/assets/css/styles.css')
    );
    wp_enqueue_style(
        'kigure-portfolio-wordpress',
        get_theme_file_uri('/assets/css/wordpress.css'),
        ['kigure-portfolio-main'],
        kigure_portfolio_asset_version('/assets/css/wordpress.css')
    );
    wp_enqueue_script(
        'kigure-portfolio-main',
        get_theme_file_uri('/assets/js/script.js'),
        [],
        kigure_portfolio_asset_version('/assets/js/script.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'kigure_portfolio_enqueue_assets');

function kigure_portfolio_body_classes(array $classes): array
{
    if (is_page(['wordpress-corporate', 'inquiry-app'])) {
        $classes[] = 'detail-page';
    }

    return $classes;
}
add_filter('body_class', 'kigure_portfolio_body_classes');

function kigure_portfolio_meta_description(): void
{
    $descriptions = [
        'wordpress-corporate' => '地域密着型サービス企業を想定したWordPress企業サイトの自主制作事例。設計、デザイン、CMS実装、保守性への考え方を紹介します。',
        'inquiry-app' => 'PHP、JavaScript、MySQL、Notion APIを使ったお問い合わせ管理アプリの自主制作事例。業務フロー、データ設計、実装方針を紹介します。',
    ];

    if (is_front_page()) {
        $description = 'H.kigureのWeb制作・開発ポートフォリオ。WordPress、PHP、JavaScriptを中心に、実装・保守・環境構築・デプロイまで対応します。';
    } elseif (is_page() && isset($descriptions[get_post_field('post_name', get_queried_object_id())])) {
        $description = $descriptions[get_post_field('post_name', get_queried_object_id())];
    } else {
        return;
    }

    printf("\n<meta name=\"description\" content=\"%s\" />\n", esc_attr($description));
    echo '<meta name="theme-color" content="#0b1020" />' . "\n";
}
add_action('wp_head', 'kigure_portfolio_meta_description', 1);

function kigure_portfolio_customize_register(WP_Customize_Manager $wpCustomize): void
{
    $wpCustomize->add_section('kigure_portfolio_contact', [
        'title' => __('ポートフォリオ連絡先', 'kigure-portfolio'),
        'priority' => 30,
    ]);

    $wpCustomize->add_setting('kigure_portfolio_email', [
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wpCustomize->add_control('kigure_portfolio_email', [
        'label' => __('メールアドレス', 'kigure-portfolio'),
        'section' => 'kigure_portfolio_contact',
        'type' => 'email',
    ]);

    $wpCustomize->add_setting('kigure_portfolio_github_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wpCustomize->add_control('kigure_portfolio_github_url', [
        'label' => __('GitHub URL', 'kigure-portfolio'),
        'section' => 'kigure_portfolio_contact',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'kigure_portfolio_customize_register');
