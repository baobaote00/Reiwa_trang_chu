
<?php
session_start();
if (!isset($_GET['action'])) {
    $_GET['action'] = 'index';
}

require "controllers/Controller.php";
