<?php
/*
Template Name: Create page
*/
?>
<?php get_header(); ?>
<section class="content-section">


    <h2>Create Post</h2>
    <form method="post" id='addPost' action="wordpress.local/" >
        <!-- input for title, content and status  -->
        <input type="text" name="title" id="title" placeholder="Title" class="text-input title">
        <textarea id="content" name="name" rows="8" cols="80" placeholder="Content" class="text-input"></textarea>
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
    
</section>
<?php get_footer(); ?>