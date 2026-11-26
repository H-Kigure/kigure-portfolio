<?php
get_header();
?>
<main class="wp-content-page" id="main">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="wp-content-page__body"><?php the_content(); ?></div>
    </article>
  <?php endwhile; ?>
</main>
<?php
get_footer();
