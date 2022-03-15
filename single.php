<?php get_header(); ?>



  <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <section class="content-section">

        <?php if(has_post_thumbnail()):?>
          <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
        <?php endif;?>

        <h1><?php the_title(); ?></h1>
        <p><?php echo get_the_date('l jS F, Y');?></p>

        <?php the_content();?>

        <?php
        $firstname = get_the_author_meta('first_name');
        $lastname = get_the_author_meta('last_name');
        ?>
        <p>Created by: <?php echo $firstname;?> <?php echo $lastname;?></p>

      </section>
  <?php endwhile; endif;?>

<?php get_footer(); ?>
