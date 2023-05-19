<?php

/**
 * The template to display the add new post page.
 */
require APP_DIR . '/views/inc/header.php'; ?>

<h1>Create Post</h1>

<form method="POST" action="/blog">
    <label for="title">Title</label>
    <input type="text" id="title" name="title">

    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <button type="submit">Post</button>
</form>


<?php require APP_DIR . '/views/inc/footer.php'; ?>