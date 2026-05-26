<?php
/**
 * Default Page Template
 *
 * @package StrataFitness
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
  <section class="section" id="main-content">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>
