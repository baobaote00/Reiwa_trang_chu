<?php

foreach (new DirectoryIterator(__DIR__) as $file) {
    if ($file->isDot()) continue;

    if ($file->isDir()) {
        continue;
    }
    include_once $file;
}
require_once './models/get.php';
require_once './models/set.php';

for ($i = 2; $i < count(scandir("config")); $i++) {
    include_once "config/" . scandir("config")[$i];
}

if ($_GET['action'] == 'sendmail') {
    if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['content'])) {
    }
    $_GET['action'] = 'index';
}
include_once "view/template/" . $_GET['action'] . ".php";
