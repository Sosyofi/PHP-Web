<?php
if (isset($_GET['nickname'])) {
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/entity_functions/userfunc.php';
    $userfunc = new userfunc($db);

    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();

    $userfunc->searchUser($_GET['nickname']);
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}
