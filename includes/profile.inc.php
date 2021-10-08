<?php

if (isset($_POST['submit'])) {
    session_start();
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/profilefunc.php';
    $profile = new profile($db);

    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new User();

    $query = "UPDATE users SET";
    $comma = " ";
    foreach ($_POST as $key => $val) {
        if (
            !empty($val)
        ) {
            $query .= $comma . $key . " = '" . $val . "'";
            $comma = ", ";
        }
    }
    $query = $query . ' WHERE id =' . $_SESSION['userid'];
    $profile->profileUpdate($query);
}
