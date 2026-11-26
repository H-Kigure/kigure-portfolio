# H.kigure Portfolio Theme

静的HTML版のポートフォリオをWordPressへ移行するためのオリジナルテーマです。

## テンプレート対応

| 表示 | テンプレート |
| --- | --- |
| 固定フロントページ | `front-page.php` |
| WordPress企業サイト | `page-wordpress-corporate.php` |
| お問い合わせ管理アプリ | `page-inquiry-app.php` |
| 通常の固定ページ | `page.php` |

各制作物ページは、親ページ `works` の子ページとして次のスラッグで作成します。

- `wordpress-corporate`
- `inquiry-app`

## アセット

`assets/css/styles.css` と `assets/js/script.js` は静的HTML版と共通です。プロジェクトルートで `node scripts/sync-wordpress-assets.mjs` を実行して同期します。

WordPress固有の調整は `assets/css/wordpress.css` に記述します。

## 今後の拡張

現在はデザインを正確に移行できるよう、主要な掲載内容をテンプレートへ配置しています。管理画面から全項目を編集する段階では、ACFなどのフィールド定義へ順次移動できます。
