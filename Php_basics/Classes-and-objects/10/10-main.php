<?php

require_once 'Video.php';
require_once 'VideoStore.php';
require_once 'DisplayVideoStore.php';

$store = new VideoStore();
$app = new DisplayVideoStore($store);

$app->run();