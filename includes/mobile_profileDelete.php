<?php
if (isset($_POST['id'])) {

    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_profilefunc.php';
    $profile = new profile($db);

    require_once 'entity/user.php';
    $user = new User();

    $profile->profileDelete($_POST['id']);
} else {
    $response = array();

    $response["success"] = 0;
    $response["users"] = array();
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}
