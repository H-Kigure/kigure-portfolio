<?php
/**
 * Plugin Name: Local MailCatcher
 * Description: Routes local WordPress mail to the Docker MailCatcher service.
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('phpmailer_init', static function ($phpmailer): void {
    if (wp_get_environment_type() !== 'local') {
        return;
    }

    $phpmailer->isSMTP();
    $phpmailer->Host = getenv('WP_MAIL_HOST') ?: 'mailcatcher';
    $phpmailer->Port = (int) (getenv('WP_MAIL_PORT') ?: 1025);
    $phpmailer->SMTPAuth = false;
    $phpmailer->SMTPSecure = '';
});
