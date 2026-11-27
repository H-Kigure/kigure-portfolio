<?php
get_header();
?>
<main class="wp-content-page" id="main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="wp-content-page__body"><?php the_excerpt(); ?></div>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <h1>コンテンツがありません</h1>
  <?php endif; ?>
</main>
<?php
get_footer();
