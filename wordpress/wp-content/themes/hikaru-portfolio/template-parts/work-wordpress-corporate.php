<main id="main">
  <section class="project-hero" aria-labelledby="project-title">
    <p class="project-breadcrumb reveal"><a href="<?php echo esc_url(home_url('/')); ?>">Portfolio</a><span>/</span>Selected Works 01</p>
    <div class="project-hero-grid">
      <div class="reveal">
        <p class="project-label">Sample Project / Corporate</p>
        <h1 class="project-title" id="project-title">WordPress<br />企業サイト<small>AOBA Corporate Website</small></h1>
      </div>
      <div class="project-summary-wrap reveal">
        <p class="project-summary">地域密着型のサービス企業を想定し、サービス内容の伝わりやすさと、公開後の更新・保守のしやすさを両立する企業サイトを設計します。</p>
        <span class="project-status"><i aria-hidden="true"></i>Design Prototype</span>
      </div>
    </div>
    <dl class="project-meta reveal">
      <div><dt>制作区分</dt><dd>自主制作サンプル</dd></div>
      <div><dt>担当範囲</dt><dd>設計・デザイン・実装</dd></div>
      <div><dt>想定期間</dt><dd>4〜6週間</dd></div>
      <div><dt>ステータス</dt><dd>構成・UI設計</dd></div>
    </dl>
  </section>

  <div class="project-showcase-wrap">
    <div class="work-visual corporate-mockup project-showcase reveal" aria-label="AOBA企業サイトの画面イメージ">
      <div class="browser-bar"><i></i><i></i><i></i></div>
      <div class="mock-nav"><b>AOBA</b><span>ABOUT&nbsp;&nbsp;&nbsp; SERVICE&nbsp;&nbsp;&nbsp; WORKS&nbsp;&nbsp;&nbsp; NEWS&nbsp;&nbsp;&nbsp; CONTACT</span></div>
      <div class="mock-hero"><p>暮らしと仕事を、<br />次の景色へ。</p><span>SCROLL TO DISCOVER</span></div>
      <div class="mock-blocks"><i></i><i></i><i></i></div>
    </div>
  </div>

  <div class="project-main">
    <div class="project-layout">
      <aside class="project-toc reveal" aria-label="ページ内目次">
        <p>Contents</p>
        <ol>
          <li><a href="#overview"><span>01</span>概要</a></li>
          <li><a href="#requirements"><span>02</span>想定要件</a></li>
          <li><a href="#scope"><span>03</span>担当・技術</a></li>
          <li><a href="#structure"><span>04</span>サイト構成</a></li>
          <li><a href="#implementation"><span>05</span>実装方針</a></li>
        </ol>
      </aside>

      <div class="project-body">
        <section class="content-block reveal" id="overview">
          <p class="content-kicker">01 / Overview</p>
          <h2>更新する人と、<br />訪れる人の両方に使いやすく。</h2>
          <p class="content-lead">専門的なサービスを初めて見る人にも理解でき、担当者自身で継続的に情報を更新できることを目標にした、WordPressオリジナルテーマの企業サイトです。</p>
          <p>実務で経験してきた企業・団体サイトの設計、ページ単位のデザイン、WordPress実装、公開後の保守を、一つの公開可能なサンプルへ再構成します。</p>
          <p class="project-notice">このページは自主制作サンプルの設計内容です。実在する企業・案件とは関係ありません。</p>
        </section>

        <section class="content-block reveal" id="requirements">
          <p class="content-kicker">02 / Requirements</p>
          <h2>想定する課題</h2>
          <p>サイトリニューアルを検討する中小企業を想定し、よく起こる3つの課題から要件を整理しています。</p>
          <div class="challenge-grid">
            <article class="challenge-card"><span>01</span><h3>サービスが伝わりにくい</h3><p>情報を利用者の目的別に整理し、専門用語に頼らず内容と強みを伝えます。</p></article>
            <article class="challenge-card"><span>02</span><h3>更新が担当者依存になる</h3><p>ニュースや実績を管理画面から迷わず登録できる入力項目に分けます。</p></article>
            <article class="challenge-card"><span>03</span><h3>公開後に改修しづらい</h3><p>テンプレートと部品の責務を分け、追加・修正しやすい構造にします。</p></article>
          </div>
        </section>

        <section class="content-block reveal" id="scope">
          <p class="content-kicker">03 / Scope &amp; Stack</p>
          <h2>担当範囲と技術</h2>
          <div class="role-grid">
            <div><h3>設計・制作</h3><ul class="plain-list"><li>要件とターゲットの整理</li><li>サイトマップ・画面構成</li><li>ページデザイン</li><li>レスポンシブコーディング</li></ul></div>
            <div><h3>実装・公開</h3><ul class="plain-list"><li>WordPressテーマ実装</li><li>更新機能・入力項目設計</li><li>Docker開発環境</li><li>Git管理・サーバー公開</li></ul></div>
          </div>
          <ul class="stack-list" aria-label="想定技術"><li>WordPress</li><li>PHP</li><li>MySQL</li><li>HTML</li><li>SCSS</li><li>JavaScript</li><li>Docker</li><li>Git</li></ul>
        </section>

        <section class="content-block reveal" id="structure">
          <p class="content-kicker">04 / Structure</p>
          <h2>サイト構成</h2>
          <p>必要な情報へ最短で移動できる基本構成です。NEWSとWORKSはWordPressの投稿機能として、一覧・詳細ページを持たせます。</p>
          <div class="page-map" aria-label="サイトマップ">
            <div><b>TOP</b><span>01</span></div><div><b>ABOUT</b><span>02</span></div><div><b>SERVICE</b><span>03</span></div><div><b>WORKS</b><span>04</span></div>
            <div><b>NEWS</b><span>05</span></div><div><b>RECRUIT</b><span>06</span></div><div><b>CONTACT</b><span>07</span></div><div><b>POLICY</b><span>08</span></div>
          </div>
        </section>

        <section class="content-block reveal" id="implementation">
          <p class="content-kicker">05 / Implementation</p>
          <h2>実装方針</h2>
          <ul class="feature-list">
            <li><span>01</span><b>更新しやすい管理画面</b><p>入力項目を用途ごとに整理し、本文へ直接レイアウトを記述しなくても更新できる形にします。</p></li>
            <li><span>02</span><b>保守しやすいテーマ構成</b><p>共通部品、テンプレート、スタイルを分割し、改修時の影響範囲を把握しやすくします。</p></li>
            <li><span>03</span><b>表示速度への配慮</b><p>画像サイズと読み込み順を最適化し、必要以上のプラグインやJavaScriptを追加しません。</p></li>
            <li><span>04</span><b>基本的な安全対策</b><p>出力時のエスケープ、フォーム保護、更新運用、バックアップを含めて設計します。</p></li>
          </ul>
        </section>
      </div>
    </div>
  </div>

  <section class="project-next" aria-labelledby="next-title">
    <div class="project-next-inner">
      <div><p>Next Project</p><h2 id="next-title">お問い合わせ<br />管理アプリ</h2></div>
      <a href="<?php echo esc_url(home_url('/works/inquiry-app/')); ?>" aria-label="お問い合わせ管理アプリの詳細を見る">→</a>
    </div>
  </section>
</main>
