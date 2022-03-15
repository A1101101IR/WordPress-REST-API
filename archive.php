<?php get_header(); ?>

<section class="content-body">
  <h1><?php single_cat_title(); ?></h1>

    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="post-card">
            <div class="card-img">
              <?php if(has_post_thumbnail()):?>
                <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
              <?php endif;?>
            </div>
            <div class="card-text">
              <div>
                <h3><?php the_title();?></h3>
                <?php the_excerpt();?>
              </div>
              <a href="<?php the_permalink();?>">Read more</a>
            </div>


        </div>
    <?php endwhile; endif;?>
</section>

<?php get_footer(); ?>
