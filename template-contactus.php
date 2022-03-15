<?php
/*
Template Name: Single page
*/
?>
<?php get_header(); ?>
 <section class="content-section">
     <?php if (have_posts()) : while (have_posts()) : the_post();?>

        <h1><?php the_title(); ?></h1>
        <?php the_content();?>

     <?php endwhile; endif;?>
 </section>
<?php get_footer(); ?>
