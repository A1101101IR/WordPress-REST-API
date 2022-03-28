<?php
/*
Template Name: External API
*/
?>
<?php get_header(); ?>
<section class="content-section">
    
    
    <div class="create-post">
        <h2>Add Post!</h2>
        <form id='addPost' action="">
        <input type="text" name="title" id="title" placeholder="title" class="text-input title">
        <textarea id="content" name="body" rows="8" cols="80" class="text-input" placeholder="body"></textarea>
        <button type="submit">Add New Post</button>
        </form>
    </div>
    <div id="post"></div>


    <script>


        async function getPosts() {
            let postData = await fetch('http://localhost:8000/posts');
            let postJson = await postData.json();
            let post = "";
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



        function deletePost(id) {
            var formdata = new FormData();
            var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
            };
            fetch(`http://localhost:8000/posts/${id}`, requestOptions)
            .then(res => res.text())
            .catch(error => console.log(error));
            setTimeout(() => {
                getPosts();
            }, 100);
            console.log("reload!")
        }

        

        const addPost = document.getElementById('addPost');
        addPost.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const input = new URLSearchParams();
            for (const pair of formData) {
                input.append(pair[0], pair[1],)
            };
            var requestOptions = {
            method: 'POST',
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: input,
            redirect: 'follow'
            };
            fetch("http://localhost:8000/posts", requestOptions)
            .then(res => res.text())
            .catch(error => console.log(error));
            setTimeout(() => {
                getPosts();
                console.log("reload!")
            }, 300);
        })

        

        getPosts();
    </script>
</section>

<?php get_footer(); ?>