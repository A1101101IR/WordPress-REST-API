<?php
/*
Template Name: External data
*/
?>
<?php get_header(); ?>
<section class="content-section">
    <h2>Add Post!</h2>
    <div>
        <form id='myForm' action="">
        <input type="text" name="title" id="title" placeholder="title" class="text-input title">
        <textarea id="content" name="body" rows="8" cols="80" class="text-input" placeholder="body"></textarea>
        <button type="submit">Add New Post</button>
        </form>
    </div>
    <div id="post"></div>
    <script>


        /* This will print each post in our array/databas to frontend. */
        async function getPosts() {
            let postData = await fetch('http://localhost:8000/posts');
            let postJson = await postData.json();
            let post = "";
            console.log(postJson);
            if (postJson) {
                postJson.slice().reverse().forEach(item => {
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
        /* It will delete the post and reload our page after 1/sec in order to update our post list in frontend. */
        function deletePost(id) {
            var formdata = new FormData();
            var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
            };
            fetch(`http://localhost:8000/posts/${id}`, requestOptions)
            .then(response => response.text())
            .then(result => console.log("item number " + id + " was deleted!"))
            .catch(error => console.log('error', error));
            setTimeout(() => {
                location.reload(); 
            }, 1000);
            console.log("reload!")
        }


        
        /* Function for add post */
        /* When form is submited it will make a post req and reload our page after 1/sec in order to update our post list in frontend.*/
        const myForm = document.getElementById('myForm');
        myForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
            const formData = new FormData(this);
            const input = new URLSearchParams();
            for (const pair of formData) {
                input.append(pair[0], pair[1],)
            };
            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: input,
            redirect: 'follow'
            };
            fetch("http://localhost:8000/posts", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
            setTimeout(() => {
                location.reload(); 
                console.log("reload!")
            }, 1000);
        })
        getPosts();
    </script>
</section>
<?php get_footer(); ?>