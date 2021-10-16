<?php
class login
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if ($db->get_conn() === null) {
            return null;
        }
        $this->db = $db;
    }

    public function login($email, $password)
    {
        $emailExists = $this->emailExists($this->db->get_conn(), $email);
        if ($emailExists === true) {
            $response["success"] = 0;
            $response["user_id"] = 0;
            $response["message"] = "Email bulunamadı";
            echo json_encode($response);
            exit();
        }

        $pwdHashed = $emailExists["user"][0]["password"];
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false) {
            $response["success"] = 0;
            $response["user_id"] = 0;
            $response["message"] = "Yanlış Şifre";
            echo json_encode($response);
            exit();
        } else if ($checkPwd === true) {
            echo json_encode($emailExists);
            exit();
        }
    }

    function emailExists($conn, $email)
    {
        $response = array();
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response["success"] = 0;
            $response["user_id"] = 0;
            $response["message"] = "Email bulunamadı";
            echo json_encode($response);
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email,);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {

            $response["success"] = 1;
            $response["user_id"] = $row["id"];
            $response["message"] = "İşlem Başarılı";
            echo json_encode($response);
            exit();
        } else {
            return true;
        }
        mysqli_stmt_close($stmt);
    }

    function emptyInputLogin($email, $hashedPwd)
    {

        if (empty($email) || empty($hashedPwd)) {
            return false;
        } else {
            return true;
        }
    }
    function invalidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
}