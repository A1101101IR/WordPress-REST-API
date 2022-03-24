<?php
/*
Template Name: Create page
*/
?>
<?php get_header(); ?>
<section class="content-section">
    <h2>Create Post</h2>
    <form class="" action="index.html" method="post">
        <input type="text" name="title" id="title" placeholder="Title" class="text-input title">
        <textarea id="content" name="name" rows="8" cols="80" placeholder="Content" class="text-input"></textarea>
        <!-- <div>
        <input id="status" type="radio" value="publish">
        <input id="status" type="radio" value="publish">
        <input id="status" type="radio" value="publish">
        </div> -->
        <button type="submit" name="button" onclick="addPost()">Publish</button>
    </form>
    <div id="container">
        <button id="addPost" onclick="addPost()">add post</button>
    </div>
    <script>
        function addPost() {
            console.log('hello')
            var input = {
                'titel': document.getElementById('title').value,
                'content': document.getElementById('content').value,
                'status': document.getElementById('status').value
            }
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93b3JkcHJlc3MubG9jYWwiLCJpYXQiOjE2NDc1MTQ5ODMsIm5iZiI6MTY0NzUxNDk4MywiZXhwIjoxNjQ4MTE5NzgzLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.ZD2QVLLJ5kN6cVFFbrLXfZcoecOYN4JsTF44NeVADic");
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: input,
                redirect: 'follow'
            };
            fetch("http://wordpress.local/wp-json/wp/v2/posts", requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        }
    </script>
</section>
<?php get_footer(); ?>