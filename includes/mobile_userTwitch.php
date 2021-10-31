<?php

if (isset($_GET['twitch'])) {
    require_once './functions/entity_functions/socialfunc.php';

    if ($socialfunc->getTwitchLiveStatus($_GET['twitch']) == "live") {
        $response = array();

        $response["success"] = 0;
        $response["message"] = "live";
        echo json_encode($response);
        exit();
    } else {
        $response = array();

        $response["success"] = 0;
        $response["message"] = "offline";
        echo json_encode($response);
        exit();
    }
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Hesap bulunmamaktadır";
    echo json_encode($response);
    exit();
}
