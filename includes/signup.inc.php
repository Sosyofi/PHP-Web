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
    $user->set_nickname($_POST['nickname']);
    $user->set_first_name($_POST['first_name']);
    $user->set_last_name($_POST['last_name']);
    $user->set_email($_POST['email']);
    $user->set_hashed_password($_POST['hashed_password']);

    if ($signup->emptyInputSignup(
        $user->get_nickname(),
        $user->get_first_name(),
        $user->get_last_name(),
        $user->get_email(),
        $user->get_hashed_password(),
    ) !== true) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if ($signup->invalidName($user->get_first_name()) !== true) {
        header("location: ../signup.php?error=invalidName");
        exit();
    }
    if ($signup->invalidSurName($user->get_last_name()) !== true) {
        header("location: ../signup.php?error=invalidSurName");
        exit();
    }
    if ($signup->invalidEmail($user->get_email()) !== true) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if ($signup->emailExists($db->get_conn(), $user->get_email()) !== true) {
        header("location: ../signup.php?error=epostataken");
        exit();
    }
    $signup->userRegister(
        $user->get_nickname(),
        $user->get_first_name(),
        $user->get_last_name(),
        $user->get_email(),
        $user->get_hashed_password(),
    );
} else {
    header('location: ../index.php');
    exit();
}
