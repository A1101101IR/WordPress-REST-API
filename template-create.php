<?php
/*
Template Name: Create page
*/
?>
<?php get_header(); ?>
<section class="content-section">
    <h2>Create Post</h2>
    <form class="" id='myForm' action="index.html" method="post">
        <!-- input for title, content and status  -->
        <input type="text" name="title" id="title" placeholder="Title" class="text-input title">
        <textarea id="content" name="name" rows="8" cols="80" placeholder="Content" class="text-input"></textarea>
        <input type="text" name="status" id="status" placeholder="status" class="text-input title">
        <button type="submit" name="button">Publish</button>
    </form>
    <script>
        const myForm = document.getElementById('myForm');
        /* When form is submited it will make a post req*/
        myForm.addEventListener('submit', function (e) {
            e.preventDefault();
            /* my haeder info fo post req */
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93b3JkcHJlc3MubG9jYWwiLCJpYXQiOjE2NDgxMjMwOTAsIm5iZiI6MTY0ODEyMzA5MCwiZXhwIjoxNjQ4NzI3ODkwLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.haL4mOLTzCaLRXPbmW6YrUrCmbpzfalRYMIcEdY6bsU");
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            /* it will take form data and create a array of it for body in requestOptions */
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
            /* fetch the post req to wp server */
            fetch("http://wordpress.local/wp-json/wp/v2/posts", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
            console.log('new post is added!');
        })
    </script>
</section>
<?php get_footer(); ?>