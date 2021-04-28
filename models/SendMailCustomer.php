<?php
var_dump($_POST);
require '../config/database.php';
require '../config/config.php';
spl_autoload_register(function ($class_name) {
    require  $class_name . '.php';
});
$nguoiNhan = $_POST['email'];
$subject = $_POST['name'];
$fromName = $_POST['phone'];
$noiDung = $_POST['content'];
$customerModel = new CustomerModel();
$customerModel->insertKhachHang($_POST);
TienIch::sendEmail($nguoiNhan, $fromName, $subject, $noiDung);
