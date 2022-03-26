<?php
/*
Template Name: External data
*/
?>
<?php get_header(); ?>
<section class="content-section">
    <h2>News</h2>
    <div id="post"></div>
    <script>
        let postURL = 'http://localhost:8000/posts';
        async function getPosts() {
            let postData = await fetch(postURL);
            let postJson = await postData.json();
            let post = "";
            console.log(postJson);
            if (postJson) {
                postJson.forEach(item => {
                    post += 
                    `<div class="post-body">
                        <h1 class="post-title">${item.title}</h1>
                        <p class="post-caption">${item.body}</p>
                        <a class="post-link">Link</a>
                    </div>`;
                });
            }
            document.getElementById('post').innerHTML = post;
        }
        getPosts();
    </script>
</section>
<?php get_footer(); ?>