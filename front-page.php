<?php get_header(); ?>

<h1><?php single_cat_title(); ?></h1>

  <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="post-card">

          <h3><?php the_title();?></h3>
          <?php the_excerpt();?>
          <a href="<?php the_permalink();?>">Read more</a>

      </div>
  <?php endwhile; endif;?>

<?php get_footer(); ?>
