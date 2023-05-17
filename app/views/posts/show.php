<?php require APP_DIR . '/views/inc/header.php' ?>

<article>
    <small>Published: <?= $post['published_at'] ?></small>
    <h1><?= $data['title'] ?></h1>
    <p><?= $post['content'] ?></p>
</article>


<?php require APP_DIR . '/views/inc/footer.php' ?>