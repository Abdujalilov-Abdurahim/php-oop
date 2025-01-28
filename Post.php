<?php
$title = "Post";
require_once "config/bootstrap.php";
require "header/navbar.php";

$post_id = $_GET["id"];

$post = Post::getById($post_id);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];

    $result = Post::Delete($id);
    if ($result == 1) {
        header("Location: index.php");
        exit;
    }
}


?>


<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"> <?= $post->title ?> </h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <?= $post->created_at ?> </div>
                    <!-- Post categories-->
                    <a class="btn btn-secondary" href="Post-edit.php?id=<?= $post->id ?>">Update</a>
                    <form action="" method="POST" onsubmit="return confirm('Rostdan ham o\'chirmoqchimisiz?')">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <input type="hidden" name="delete">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </header>

                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"> <?= $post->body ?> </p>
                </section>
            </article>

        </div>
    </div>
</div>

<?php require "header/footer.php"; ?>