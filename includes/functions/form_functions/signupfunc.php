<!-- Bu dosya, signup.inc.php dosyasına gelen verilerin işleme tabi tutulacağı ve bu işlemlerin yazıldığı fonksiyonların bulunduğu dosyadır. -->

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
        $sql = "INSERT INTO users (nickname, first_name, last_name, email, hashed_password) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($this->db->get_conn());
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $hashedPwd = password_hash($hashed_password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", strtolower($nickname), $first_name, $last_name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php?error=success");
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
            header("location: ../index.php?error=stmtfailed");
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
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", strtolower($nickname),);
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
