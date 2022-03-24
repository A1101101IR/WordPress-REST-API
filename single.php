<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="content-section">
      <?php if (has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>

      <h1><?php the_title(); ?></h1>

      <?php
      $firstname = get_the_author_meta('first_name');
      $lastname = get_the_author_meta('last_name');
      ?>
      <div class="post-date-autuor">
        <p>Author: <?php echo $firstname; ?> <?php echo $lastname; ?></p>
        <p><?php echo get_the_date('l jS F, Y'); ?></p>
      </div>

      <?php the_content(); ?>
      <?php $post_id = get_the_ID();
      echo "<button onClick=deletePost('$post_id')>Delete</button>";
      ?>
      <!-- 'onclick="deletePost($post_id)' -->

      <script>
        function deletePost($post_id) {
          /* var myHeaders = new Headers();
          myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93b3JkcHJlc3MubG9jYWwiLCJpYXQiOjE2NDc1MTQ5ODMsIm5iZiI6MTY0NzUxNDk4MywiZXhwIjoxNjQ4MTE5NzgzLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.ZD2QVLLJ5kN6cVFFbrLXfZcoecOYN4JsTF44NeVADic");

          var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
          };

          fetch("http://wordpress.local/wp-json/wp/v2/posts/74", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error)); */
          console.log($post_id)
        }
      </script>
    </section>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>