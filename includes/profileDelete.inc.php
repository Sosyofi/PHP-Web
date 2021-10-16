<?php

if(isset($_POST["submit"])){
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/profilefunc.php';
    $profile = new profile($db);

    require_once 'entity/user.php';
    $user = new User();

    $profile->profileDelete();
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Please provide a valid Credentials";
    echo json_encode($response);
    exit();
}