<?php
if (isset($_POST['id'])) {

    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/entity_functions/userfunc.php';
    $userfunc = new userfunc($db);

    require_once 'entity/user.php';
    $user = new User();

    $userfunc->unfollowUser($_POST['id'], $_POST['follower_id']);
} else {
    $response = array();

    $response["success"] = 0;
    $response["users"] = array();
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}
