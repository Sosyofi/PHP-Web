<?php

// veri tabanı bağlantısı ve nesnesinin oluşturulması
require_once 'db.inc.php';
$db = new DBController();

// loginfunc.php bağlantısı ve nesnesinin oluşturulması
require_once 'functions/form_functions/mobile_loginfunc.php';
$login = new login($db);

// user nesnesinin oluşturulması
require_once 'entity/user.php';
$user = new User();

// atama işlemleri
$user->set_email($_POST['email']);
$user->set_hashed_password($_POST['hashed_password']);


if ($login->emptyInputLogin($user->get_email(), $user->get_hashed_password()) !== true) {
    echo json_encode("Please provide a valid credentials");
    exit();
}
if ($login->invalidEmail($user->get_email()) !== true) {
    echo json_encode("Email is invalid");
    exit();
}
$login->login($user->get_email(), $user->get_hashed_password());
