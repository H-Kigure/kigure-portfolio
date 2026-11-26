# H.kigure ポートフォリオ（仮組）

WordPress / PHP Web Developer としての実務経験を伝える、1ページ構成のポートフォリオサイトです。

## 静的HTML版の開発環境

- Docker Desktop
- Docker Compose v2
- Apache HTTP Server 2.4
- HTML / CSS / JavaScript

### 起動

リポジトリのルートで次のコマンドを実行します。

```bash
docker compose up --build
```

起動後、ブラウザで <http://localhost:3000> を開きます。
`dist` ディレクトリはコンテナへマウントされているため、HTML・CSS・JavaScriptを編集した後はブラウザを更新すると変更が反映されます。

バックグラウンドで起動する場合は次のコマンドを使用します。

```bash
docker compose up -d --build
```

停止する場合は次のコマンドを使用します。

```bash
docker compose down
```

### ポートを変更する場合

`.env.example` を `.env` にコピーし、`APP_PORT` を変更します。Windows PowerShellでは次のようにコピーできます。

```powershell
Copy-Item .env.example .env
```

例：`APP_PORT=8080` に変更した場合は、<http://localhost:8080> で確認できます。

## WordPress版の開発環境

公開中の静的HTML版を残したまま、WordPress版を別構成で起動できます。

### 1. 環境変数ファイルを作成

Windows PowerShellでは次のコマンドを実行します。

```powershell
Copy-Item .env.wordpress.example .env.wordpress
```

`.env.wordpress` の次の項目を編集します。既存のファイルがある場合はコピーせず、項目を追記してください。

| 変数 | 設定内容 |
| --- | --- |
| `WP_SITE_TITLE` | サイトタイトル |
| `WP_SITE_URL` | サイトURL（省略時は `http://localhost:WP_PORT`） |
| `WP_ADMIN_USER` | 管理者のログイン名 |
| `WP_ADMIN_PASSWORD` | 管理者パスワード（必須） |
| `WP_ADMIN_EMAIL` | 管理者メールアドレス |

空白を含む値は引用符で囲みます。パスワードの `$` などをそのまま扱う場合はシングルクォートを使用してください。

### 2. WordPressを起動

```bash
docker compose --env-file .env.wordpress -f compose.wordpress.yaml up -d
```

起動後のURLは次のとおりです。

- WordPress: <http://localhost:8080>
- phpMyAdmin: <http://localhost:8081>
- MailCatcher: <http://localhost:1080>

サイトタイトルと管理者アカウントは、次のWP CLIコマンドで設定します。

### 3. WP CLIで初期インストール・サイト設定

次のコマンドを実行します。ブラウザでの初期インストール操作は不要です。

```bash
docker compose --env-file .env.wordpress -f compose.wordpress.yaml run --rm wpcli
```

このコマンドで以下を設定します。

- WordPressの初期インストール（未インストール時）
- サイトタイトル・URL・管理者メールアドレス
- 管理者ユーザーの作成、または既存ユーザーのパスワード・メールアドレス・権限の更新
- `kigure-portfolio` テーマの有効化
- 固定フロントページの作成・設定
- 制作物の親ページと詳細ページ2件の作成
- パーマリンク形式の設定

`.env.wordpress` を変更して再実行すると、設定を更新できます。固定ページは重複作成しません。管理者のログイン名を変更した場合は新しい管理者を作成し、以前のユーザーは残します。

任意のWP CLIコマンドも実行できます。

```bash
docker compose --env-file .env.wordpress -f compose.wordpress.yaml run --rm wpcli user list
docker compose --env-file .env.wordpress -f compose.wordpress.yaml run --rm wpcli option get blogname
```

### 4. CSS・JavaScriptを同期

静的HTML版のCSS・JavaScriptを変更した場合は、次のコマンドでWordPressテーマへ反映します。

```bash
node scripts/sync-wordpress-assets.mjs
```

メールアドレスとGitHub URLは、WordPress管理画面の「外観 → カスタマイズ → ポートフォリオ連絡先」から設定できます。ローカル環境で送信されたWordPressメールはMailCatcherへ届きます。

停止する場合は次のコマンドを使用します。

```bash
docker compose --env-file .env.wordpress -f compose.wordpress.yaml down
```

## ディレクトリ構成

```text
.
├── dist/             # Webサイト本体
│   ├── index.html
│   ├── styles.css
│   ├── script.js
│   └── works/           # 制作物の詳細ページ
│       ├── wordpress-corporate/
│       └── inquiry-app/
├── compose.yaml      # 開発用コンテナ設定
├── compose.wordpress.yaml # WordPress / MySQL開発環境
├── Dockerfile        # Apacheイメージ
├── .env.example      # 静的HTML版のポート設定例
├── .env.wordpress.example # WordPress版の設定例
├── scripts/          # アセット同期スクリプト
└── wordpress/
    ├── scripts/      # WordPress初期設定
    └── wp-content/
        ├── mu-plugins/
        └── themes/kigure-portfolio/
```

## 未確定・今後差し替える項目

- 2件のサンプル制作物のデモURL、GitHubリポジトリ
- 現行のメールアドレス
- GitHubプロフィールURL
- 制作物の実画面・キャプチャ
