<?php get_header(); ?>

<section class="content-body">
  <h1><?php single_cat_title(); ?></h1>
    <!-- Get, Create, Edit and Delete item to/from WP API -->


    
    <div class="create-post">
    <h2>Create Post</h2>
    <form method="post" id='addPost' action="wordpress.local/" >
        <!-- input for title, content and status  -->
        <input type="text" name="title" id="title" placeholder="Title" class="text-input title">
        <textarea id="content" name="content" rows="8" cols="80" placeholder="Content" class="text-input"></textarea>
        <input type="text" name="status" id="status" placeholder="status" class="text-input title">
        <button type="submit" id="btn" name="button">Publish</button>
    </form>




    <script>
        const addPost = document.getElementById('addPost');
        addPost.addEventListener('submit', function (e) {
            
            e.preventDefault();
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93b3JkcHJlc3MubG9jYWwiLCJpYXQiOjE2NDgxMjMwOTAsIm5iZiI6MTY0ODEyMzA5MCwiZXhwIjoxNjQ4NzI3ODkwLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.haL4mOLTzCaLRXPbmW6YrUrCmbpzfalRYMIcEdY6bsU");
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
   
            const formData = new FormData(this);
            const input = new URLSearchParams();
            for (const pair of formData) {
                input.append(pair[0], pair[1])
            };

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: input,
            redirect: 'follow'
            };

            fetch("http://wordpress.local/wp-json/wp/v2/posts", requestOptions)
            .then(response => response.text())
            .then(console.log('New post is added!'))
            .catch(error => console.log('error', error));
            setTimeout(() => {
                window.location='/';
            }, 1000);
        })
    </script>
    </div>


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
              <a href="<?php the_permalink();?>"><button>Read more</button></a>
            </div>
        </div>
    <?php endwhile; endif;?>



</section>

<?php get_footer(); ?>
