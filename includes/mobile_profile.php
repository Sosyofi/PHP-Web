<?php
if (isset($_POST['id'])) {
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_profilefunc.php';
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
    $query = $query . ' WHERE id =' . $_POST['id'] . ';';
    $profile->profileUpdate($query);
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Lütfen geçerli değerler giriniz";
    echo json_encode($response);
    exit();
}
