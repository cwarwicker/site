<?php
use Puddle\Config;
use Puddle\Page;

require_once __DIR__ . '/../blog/vendor/autoload.php';
define('PAGE', 'blog');

$Config = Config::load(file: __DIR__ . '/../blog.json');
require_once '../includes/header.php';
try {
    $Page = Page::which(config: $Config);
    $Page->render();
} catch (Exception $e) {
    echo $e->getMessage();
}
require_once '../includes/footer.php';
