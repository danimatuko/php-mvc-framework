<?php

/**
 * The template to display the content of a specific post.
 */

require APP_DIR . '/views/inc/header.php';

/**
 * Displays the content of a specific post.
 */
?>
<article>
    <small>Published: <?= $post['published_at'] ?></small>
    <h1><?= $data['title'] ?></h1>
    <p><?= $post['content'] ?></p>
</article>

<?php
/**
 * Includes the footer template file.
 */
require APP_DIR . '/views/inc/footer.php';
?>