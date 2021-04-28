
<?php
session_start();
require_once 'config/database.php';
require_once 'config/config.php';
spl_autoload_register(function ($class_name) {
    require 'models/' . $class_name . '.php';
});
if (!isset($_GET['action'])) {
    $_GET['action'] = 'index';
}

require "controllers/Controller.php";
