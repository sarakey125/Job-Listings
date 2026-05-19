<?php

$posts = require basePath('views/blog/data/posts.php');
$active_post = null;

if (isset($_GET['post'])) {
    $id = (int)$_GET['post'];
    foreach ($posts as $p) {
        if ($p['id'] === $id) {
            $active_post = $p;
            break;
        }
    }
}

loadView('blog/blog', [
    'posts' => $posts,
    'active_post' => $active_post,
]);
