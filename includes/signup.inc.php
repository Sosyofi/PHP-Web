<!-- Bu kısım, formlardan gelen $_POST değerlerini değişkene atayacağımız kısım. -->
<?php

if (isset($_POST['submit'])) {
    
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
    require_once 'db.inc.php';
    $db = new DBController();
    // loginfunc.php bağlantısı ve nesnesinin oluşturulması
    require_once 'functions/form_functions/signupfunc.php';
    $signup = new signup($db);
    
    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();

    // atama işlemleri
        
    if($_POST['page'] == '1'){
        if(empty($_POST['email']) || empty($_POST['hashed_password'])){
            header("location: ../index.php?error=emptyForm");
            exit();
        }
        if ($signup->invalidEmail($_POST['email']) !== true) {
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if ($signup->emailExists($db->get_conn(), $_POST['email']) !== true) {
            header("location: ../index.php?error=epostataken");
            exit();
        }
        session_start();
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["password"] = $_POST['hashed_password'];
        header("location: ../index.php?page=step2");
        exit();
    }

    session_start();
    $user->set_email($_SESSION["email"]);
    $user->set_hashed_password($_SESSION["password"]);
    session_unset();
    session_destroy();
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
        header("location: ../index.php?error=emptyinput&page=step2");
        exit();
    }
    if ($signup->invalidName($user->get_first_name()) !== true) {
        header("location: ../index.php?error=invalidName&page=step2");
        exit();
    }
    if ($signup->invalidSurName($user->get_last_name()) !== true) {
        header("location: ../index.php?error=invalidSurName&page=step2");
        exit();
    }
    if ($signup->nicknameExists($db->get_conn(), $user->get_nickname()) !== true) {
        header("location: ../index.php?error=nicknametaken&page=step2");
        exit();
    }
    $signup->userRegister(
        $user->get_nickname(),
        $user->get_first_name(),
        $user->get_last_name(),
        $user->get_email(),
        $user->get_hashed_password(),
    );
}
else {
    header('location: ../index.php');
    exit();
}
