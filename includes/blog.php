<?php
require_once __DIR__ . '/../blog/vendor/autoload.php';
$id = $_GET['id'] ?? null;
$param = $_GET['param'] ?? null;

$config = \Puddle\Control::loadJSON(file: __DIR__ . '/../blog/config.json');
$Control = new \Puddle\Control($config);
$Control->load();

// Are we trying to display all posts of a tag?
if ($id === 'tag') {

    $posts = $Control->getPostsByTag($param);
    echo $Control->renderList(posts: $posts);

} else if (ctype_digit($id)) {
    if ($Control->getPost($id)) {
        echo $Control->render((int)$id);
    } else {
        echo '<p>Cannot find post</p>';
    }
} else {
    $page = ($id === 'page' && ctype_digit($param)) ? $param : 1;
    // Display most recent posts.
    echo $Control->renderList(page: $page);
}
