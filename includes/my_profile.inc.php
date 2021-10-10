<?php

if (isset($_POST['submit'])) {
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/entity_functions/myprofilefunc.php';
    $myprofile = new myprofilefunc($db);

    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();

    // atama işlemleri
    
    if($_POST['image'] !== ""){
         $imageName = $_FILES['image']['name'];
         $imageType = $_FILES['image']['type'];
         $data = file_get_contents($_FILES['image']['tmp_name']);
        if(substr($imageType,0,5) == "image"){
            
            exit();
        }else{
            header('location: ../my_profile.php?error=invalidFile');
            exit();
        }
    exit();
    }
    header('location: ../my_profile.php?eklenmedi');
    exit();
    $user->set_email($_POST['email']);
    $user->set_hashed_password($_POST['hashed_password']);


    if (
        $login->emptyInputLogin($user->get_email(), $user->get_hashed_password()) !== true
    ) {
        header("location: ../index.php?error=emptyinput&page=login");
        exit();
    }
    if ($login->invalidEmail($user->get_email()) !== true) {
        header("location: ../index.php?error=invalidEmail&page=login");
        exit();
    }
    $login->login($user->get_email(), $user->get_hashed_password());
} else {
    header('location: ../my_profile.php');
    exit();
}
