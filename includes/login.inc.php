<!-- Bu kısım, formlardan gelen $_POST değerlerini değişkene atayacağımız kısım. -->
<?php

if (isset($_POST['submit'])) {
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
    require_once 'db.inc.php';
    $db = new DBController();

    // loginfunc.php bağlantısı ve nesnesinin oluşturulması
    require_once 'functions/form_functions/loginfunc.php';
    $login = new login($db);

    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();

    // atama işlemleri
    $user->set_email($_POST['email']);
    $user->set_hashed_password($_POST['hashed_password']);


    if (
        $login->emptyInputLogin($user->get_email(), $user->get_hashed_password()) !== true
    ) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    if ($login->invalidEmail($user->get_email()) !== true) {
        header("location: ../login.php?error=invalidEmail");
        exit();
    }
    $login->login($user->get_email(), $user->get_hashed_password());
} else {
    header('location: ../../index.php');
    exit();
}
