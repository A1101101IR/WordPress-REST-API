<?php
/*
Template Name: External data
*/
?>
<?php get_header(); ?>
<section class="content-section">
    <h2>Add Post!</h2>
    <div id="post"></div>
    <script>
        let postURL = 'http://localhost:8000/posts';
        /* get function */
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
                        <button onClick=deletePost(${item.id})>Delete</button>
                    </div>`;
                });
            }
            document.getElementById('post').innerHTML = post;
        }
        /* Delete function */
        function deletePost(id) {
            console.log(id)
            var formdata = new FormData();
            var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
            };
            fetch(`http://localhost:8000/posts/${id}`, requestOptions)
            .then(response => response.text())
            .then(result => console.log("item number " + id + " was deleted!"))
            .catch(error => console.log('error', error));
        }
        getPosts();
    </script>
</section>
<?php get_footer(); ?>