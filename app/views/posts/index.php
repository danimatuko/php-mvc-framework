<?php require APP_DIR . '/views/inc/header.php'; ?>

<h1>Posts</h1>

<?php foreach ($posts as $post) : ?>
<h2><?= $post['title'] ?></h2>
<article><?= $post['content'] ?></article>
<?php endforeach; ?>



<?php require APP_DIR . '/views/inc/footer.php'; ?>