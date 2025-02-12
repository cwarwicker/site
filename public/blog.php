<?php
use Puddle\Config;
use Puddle\Page;

define('PAGE', 'blog');

require_once __DIR__ . '/../blog/vendor/autoload.php';

$Config = Config::load(file: __DIR__ . '/../blog.json');
require_once '../includes/header.php';
try {
    $Page = Page::which(config: $Config);
    $Page->render();
} catch (Exception $e) {
    echo '<div class="text-center">Unable to load page. 😢</div>';
}
require_once '../includes/footer.php';
