<?php

/**
 * The template to display the edit post page.
 */
require APP_DIR . '/views/inc/header.php'; ?>

<h1>Edit Post</h1>

<form method="POST" action="/blog/<?= $post['id']; ?>">
    <input type="hidden" name="_method" value="PUT">

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?= $post['title'] ?>">

    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10"><?= $post['content'] ?></textarea>
    <button type="submit">Post</button>
</form>


<?php require APP_DIR . '/views/inc/footer.php'; ?>