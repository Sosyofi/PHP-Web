<?php

if (isset($_GET['id'])) {
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_mainfunc.php';
    $mainfunc = new mainfunc($db);

    require_once 'entity/user.php';
    $user = new User();

    $mainfunc->getProfile($_GET['id']);
} else {
    $response = array();

    $response["success"] = 0;
    $response["followed"] = array();
    $response["user"] = array();
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}
