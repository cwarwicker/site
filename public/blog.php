<?php
use Puddle\Config;
use Puddle\Page;

define('PAGE', 'blog');

require_once __DIR__ . '/../blog/vendor/autoload.php';

$Config = Config::load(file: __DIR__ . '/../blog.json');

$Page = false;
try {
    $Page = Page::which(config: $Config);
} catch (Exception $e) {
    // Do nothing.
}

require_once '../includes/header.php';
if ($Page) {
    $Page->render();
} else {
    echo '<div class="text-center">Unable to load page. 😢</div>';
}
require_once '../includes/footer.php';
