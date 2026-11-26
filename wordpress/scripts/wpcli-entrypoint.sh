#!/bin/sh
set -eu

if [ "${1:-}" != "setup" ]; then
    exec wp "$@"
fi

: "${WP_SITE_URL:?Set WP_SITE_URL.}"
: "${WP_SITE_TITLE:?Set WP_SITE_TITLE in .env.wordpress.}"
: "${WP_ADMIN_USER:?Set WP_ADMIN_USER in .env.wordpress.}"
: "${WP_ADMIN_PASSWORD:?Set WP_ADMIN_PASSWORD in .env.wordpress.}"
: "${WP_ADMIN_EMAIL:?Set WP_ADMIN_EMAIL in .env.wordpress.}"

# The Apache entrypoint copies WordPress and creates wp-config.php on first boot.
attempt=0
until [ -s /var/www/html/wp-config.php ] && [ -s /var/www/html/wp-includes/version.php ]; do
    attempt=$((attempt + 1))
    if [ "$attempt" -ge 60 ]; then
        echo 'WordPress files are not ready. Check the wordpress container logs.' >&2
        exit 1
    fi
    sleep 1
done

if ! wp core is-installed; then
    wp core install \
        --url="$WP_SITE_URL" \
        --title="$WP_SITE_TITLE" \
        --admin_user="$WP_ADMIN_USER" \
        --admin_password="$WP_ADMIN_PASSWORD" \
        --admin_email="$WP_ADMIN_EMAIL" \
        --skip-email
else
    if wp user get "$WP_ADMIN_USER" --field=ID >/dev/null 2>&1; then
        wp user update "$WP_ADMIN_USER" \
            --user_pass="$WP_ADMIN_PASSWORD" \
            --user_email="$WP_ADMIN_EMAIL" \
            --role=administrator
    else
        wp user create "$WP_ADMIN_USER" "$WP_ADMIN_EMAIL" \
            --user_pass="$WP_ADMIN_PASSWORD" \
            --role=administrator
    fi
fi

wp option update blogname "$WP_SITE_TITLE"
wp option update admin_email "$WP_ADMIN_EMAIL"
wp option update home "$WP_SITE_URL"
wp option update siteurl "$WP_SITE_URL"
exec wp eval-file /workspace/scripts/setup-site.php
