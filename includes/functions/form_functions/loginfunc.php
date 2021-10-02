<!-- Bu dosya, login.inc.php dosyasına gelen verilerin işleme tabi tutulacağı ve bu işlemlerin yazıldığı fonksiyonların bulunduğu dosyadır. -->

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

    // Veri tabanı fonksiyonları bundan sonra yazılacak.

    public function login($email, $password)
    {
        $emailExists = $this->emailExists($this->db->get_conn(), $email);

        if ($emailExists === true) {
            header("location: ../index.php?error=wronglogin&page=login");
            exit();
        }

        $pwdHashed = $emailExists["hashed_password"];
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../index.php?error=wrongPwd&page=login");
            exit();
        } else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $emailExists["id"];
            $_SESSION["username"] = $emailExists["nickname"];
            header("location: ../main.php?error=success");
            exit();
        }
    }
    
    function emailExists($conn, $email)
    {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed&page=login");
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
    
    function emptyInputLogin($email, $hashedPwd)
    {

        if (empty($email)  || empty($hashedPwd)) {
            return false;
        } else {
            return true;
        }
    }
    function invalidEmail($email)
    {
        if (!filter_var($email,  FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
}
