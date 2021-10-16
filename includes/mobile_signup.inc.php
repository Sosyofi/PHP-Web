<?php

if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['nickname']) &&
    isset($_POST['first_name']) &&
    isset($_POST['last_name'])
) {
    $response = array();
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
   

    require_once 'db.inc.php';
    $db = new DBController();
    // loginfunc.php bağlantısı ve nesnesinin oluşturulması


    require_once 'functions/form_functions/mobile_signupfunc.php';
    $signup = new signup($db);

 
    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();


    // atama işlemleri
    $user->set_email($_POST['email']);
    $user->set_hashed_password($_POST['password']);
    $user->set_nickname($_POST['nickname']);
    $user->set_first_name($_POST['first_name']);
    $user->set_last_name($_POST['last_name']);



    if ($signup->emptyInputSignup(
        $user->get_nickname(),
        $user->get_first_name(),
        $user->get_last_name(),
        $user->get_email(),
        $user->get_hashed_password(),
    ) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "Lütfen geçerli değerler giriniz";
        echo json_encode($response);
        exit();

    }
    if ($signup->invalidName($user->get_first_name()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "Geçersiz İsim";
        echo json_encode($response);
        exit();
    }
    if ($signup->invalidSurName($user->get_last_name()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "Geçersiz Soyisim";
        echo json_encode($response);
        exit();
    }
    if ($signup->invalidEmail($user->get_email()) !== true || $signup->emailExists($db->get_conn(), $user->get_email()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "invalidEmail";
        echo json_encode($response);
        exit();
    }
    if ($signup->nicknameExists($db->get_conn(), $user->get_nickname()) !== true) {
        $response["success"] = 0;
        $response["user_id"] = 0;
        $response["message"] = "nicknameExists";
        echo json_encode($response);
        exit();

    }

    $signup->userRegister(
        $user->get_nickname(),
        $user->get_first_name(),
        $user->get_last_name(),
        $user->get_email(),
        $user->get_hashed_password(),
    );
}else{
    $response = array();

    $response["success"] = 0;
    $response["user_id"] = 0;
    $response["message"] = "Lütfen internet bağlantınızı kontrol ediniz";
    echo json_encode($response);
    exit();
}