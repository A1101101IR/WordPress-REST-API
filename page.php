<?php get_header(); ?>
<h1><?php the_title(); ?></h1>
<section class="content-section">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
      </div>
  <?php endwhile;
  endif; ?>
</section>
<?php get_footer(); ?>