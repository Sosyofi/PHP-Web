<?php
if (isset($_GET['unsplash'])) {
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_mainfunc.php';
    $mainfunc = new mainfunc($db);

    require_once 'entity/user.php';
    $user = new User();

    require_once 'config.php';
    $photos = array();
    $content = file_get_contents("https://unsplash.com/@" . $_GET['unsplash']);
    if (preg_match('/<div class="VQW0y Jl9NH"(.*?)<\/div>/s', $content, $matches)) {
        foreach ($matches as $key => $match) {
            $photos = htmlentities($match);
        }
        parse_str($photos, $parsedContent["photo"]);
        echo json_encode($parsedContent);
        exit();
    } else {
        $response = array();

        $response["success"] = 0;
        $response["message"] = "Eşleşen Resim Yok";
        echo json_encode($response);
        exit();
    }
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Hata";
    echo json_encode($response);
    exit();
}
