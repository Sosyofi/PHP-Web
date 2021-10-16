<?php
if (
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $response = array();

    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_loginfunc.php';
    $login = new login($db);

    require_once 'entity/user.php';
    $user = new User();

    $user->set_email($_POST['email']);
    $user->set_hashed_password($_POST['password']);


    if ($login->emptyInputLogin($user->get_email(), $user->get_hashed_password()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "Boş alan bırakmayınız";
        echo json_encode($response);
        exit();
    }
    if ($login->invalidEmail($user->get_email()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "Geçersiz Email";
        echo json_encode($response);
        exit();
    }
    $login->login($user->get_email(), $user->get_hashed_password());
} else {
    $response = array();

    $response["success"] = 0;
    $response["user_id"] = 0;
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}