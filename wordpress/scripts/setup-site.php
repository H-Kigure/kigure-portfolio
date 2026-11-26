<?php

if (! defined('WP_CLI') || ! WP_CLI) {
    fwrite(STDERR, "Run this file with WP-CLI.\n");
    exit(1);
}

function kigure_ensure_page(string $title, string $slug, int $parent = 0): int
{
    $path = $parent ? get_page_uri($parent) . '/' . $slug : $slug;
    $existing = get_page_by_path($path, OBJECT, 'page');

    if ($existing instanceof WP_Post) {
        return (int) $existing->ID;
    }

    $pageId = wp_insert_post([
        'post_title' => $title,
        'post_name' => $slug,
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_parent' => $parent,
    ], true);

    if (is_wp_error($pageId)) {
        WP_CLI::error($pageId->get_error_message());
    }

    return (int) $pageId;
}

switch_theme('kigure-portfolio');

$homeId = kigure_ensure_page('ホーム', 'home');
$worksId = kigure_ensure_page('制作物', 'works');
kigure_ensure_page('WordPress企業サイト', 'wordpress-corporate', $worksId);
kigure_ensure_page('お問い合わせ管理アプリ', 'inquiry-app', $worksId);

update_option('show_on_front', 'page');
update_option('page_on_front', $homeId);
update_option('permalink_structure', '/%postname%/');
flush_rewrite_rules();

WP_CLI::success('Theme activated and portfolio pages created.');
