<?php require APP_DIR . '/views/inc/header.php' ?>

<header>
    <h1>Blog</h1>
    <p>Welcome to the Blog! Check out our latest posts below.</p>
</header>

<section>
    <?php foreach ($posts as $post) : ?>

    <aside>
        <small>
            Published: <?= $post['published_at'] ?>
        </small>
        <h2><?= $post['title'] ?></h2>
        <article><?= $post['content'] ?></article>
        <br>
        <div>
            <a href="/posts/<?= $post['id'] ?>">Read More</a>
        </div>
    </aside>

    <?php endforeach; ?>
</section>


<?php require APP_DIR . '/views/inc/footer.php' ?>