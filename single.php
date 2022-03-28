<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="content-section">

      <?php if (has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>


      <?php the_content(); ?>

      
      <?php
      $firstname = get_the_author_meta('first_name');
      $lastname = get_the_author_meta('last_name');
      ?>
      <div class="post-date-autuor">
        <p>Author: <?php echo $firstname; ?> <?php echo $lastname; ?></p>
        <p><?php echo get_the_date('l jS F, Y'); ?></p>
      </div>


      <?php $post_id = get_the_ID();
      echo "<button onClick=deletePost('$post_id')>Delete</button>";
      ?>
      <?php $post_id = get_the_ID();
      echo "<button onClick=getPostForEdit('$post_id')>Edit</button>";
      ?>
      
      <div id="editFormDiv"></div>

      <script>
        /* Get post ID => send delete request => redirect to the website */
        function deletePost($post_id) {
          var myHeaders = new Headers();
          myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93b3JkcHJlc3MubG9jYWwiLCJpYXQiOjE2NDgxMjMwOTAsIm5iZiI6MTY0ODEyMzA5MCwiZXhwIjoxNjQ4NzI3ODkwLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.haL4mOLTzCaLRXPbmW6YrUrCmbpzfalRYMIcEdY6bsU");
          var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
          };
          fetch('http://wordpress.local/wp-json/wp/v2/posts/' + $post_id, requestOptions)
            .then(response => response.text())
            /* .then(result => console.log(result)) */
            .then(console.log("Post " + $post_id + " was deleted!"))
            .catch(error => console.log('error', error));
            setTimeout(() => {
                window.location='/';
            }, 1000);
        }

        async function getPostForEdit($post_id) {
          var requestOptions = {
            method: 'GET',
            redirect: 'follow'
          };
          let postData = await fetch("http://wordpress.local/wp-json/wp/v2/posts/" + $post_id, requestOptions);
          let postJson = await postData.json();
          console.log(postJson);
          /* let post = '';
          if (postJson) {
              
              post += 
                      `
                      <form id='addPost' action="">
                      <h1></h1>
                      <input type="text" name="title" id="title" placeholder="title" class="text-input title">
                      <textarea id="content" name="body" rows="8" cols="80" class="text-input" placeholder="body"></textarea>
                      <button type="submit">Update post</button>
                      `;
              }
            document.getElementById('editFormDiv').innerHTML = post; */
        }

        
      </script>




    </section>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>