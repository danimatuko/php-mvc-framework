<?php

/**
 * The template to display the index blog page.
 */

require APP_DIR . '/views/inc/header.php';

/**
 * Displays the blog page content.
 */
?>
<header>
    <h1>Blog</h1>
    <p>Welcome to the Blog! Check out our latest posts below.</p>
</header>
<div>
    <?php foreach ($posts as $post) : ?>
    <article>
        <aside>
            <small>Published: <?= $post['published_at'] ?></small>
            <h2><?= $post['title'] ?></h2>
            <article><?= $post['content'] ?></article>
            <br>
            <a href="/blog/<?= $post['id'] ?>"><u>Read More</u></a>
        </aside>
    </article>
    <br>
    <?php endforeach; ?>
</div>
</section>
<div>
    <?php
    /**
     * Includes the footer template file.
     */
    require APP_DIR . '/views/inc/footer.php';
    ?>