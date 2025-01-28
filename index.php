<?php
$title = "Bosh sahifa";
require_once "config/bootstrap.php";
require "header/navbar.php";

$posts = Post::getAll();


?>

<ul>
    <?php foreach ($posts as $post): ?>
        <ul>
            <h2 class="display-5 link-body-emphasis mb-1"> <?= $post->title; ?> </h2>
            <p> <?= $post->body; ?> </p>
            <a href="Post.php?id=<?= $post->id ?>"> Read </a>
            <hr class="border border-primary border-3 opacity-75" />
        </ul>
            <?php endforeach; ?>
</ul>
<?= require "header/footer.php"; ?>