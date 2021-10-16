<?php

class signup
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if ($db->get_conn() === null) {
            return null;
        }
        $this->db = $db;
    }

    // Veri tabanı fonksiyonları bundan sonra yazılacak.

    public function userRegister($nickname, $first_name, $last_name, $email, $hashed_password)
    {
        $response = array();
        $sql = "INSERT INTO users (nickname, first_name, last_name, email, hashed_password) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($this->db->get_conn());

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response["success"] = 0;
            $response["user_id"] = 0;
            $response["message"] = "İşlem Başarısız";
            echo json_encode($response);
            exit();
        }
        $hashedPwd = password_hash($hashed_password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $nickname, $first_name, $last_name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($this->db->get_conn());
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response["success"] = 0;
            $response["user_id"] = 0;
            $response["message"] = "İşlem Başarısız";
            echo json_encode($response);
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email,);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);

        $response["success"] = 1;
        $response["user_id"] = $row["id"];
        $response["message"] = "İşlem Başarılı";
        echo json_encode($response);
        exit();
    }

    function emptyInputSignup($nickname, $first_name, $last_name, $email, $hashedPwd)
    {

        if (empty($nickname) || empty($first_name) || empty($last_name)  || empty($email)  || empty($hashedPwd)) {
            return false;
        } else {
            return true;
        }
    }
    function  invalidName($first_name)
    {
        if (!preg_match("/^[a-zA-ZıİöÖçÇşŞğĞüÜ\s]*$/", $first_name)) {
            return false;
        } else {
            return true;
        }
    }
    function  invalidSurName($last_name)
    {
        if (!preg_match("/^[a-zA-ZıİöÖçÇşŞğĞüÜ]*$/", $last_name)) {
            return false;
        } else {
            return true;
        }
    }
    function  invalidEmail($email)
    {
        if (!filter_var($email,  FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
    function  emailExists($conn, $email)
    {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo json_encode("İşlem Başarısız");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email,);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            return true;
        }
        mysqli_stmt_close($stmt);
    }
    function  nicknameExists($conn, $nickname)
    {
        $sql = "SELECT * FROM users WHERE nickname = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo json_encode("İşlem Başarısız");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $nickname,);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            return true;
        }
        mysqli_stmt_close($stmt);
    }
}