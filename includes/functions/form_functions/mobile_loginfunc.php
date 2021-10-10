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
            echo "Email didn't found";
            exit();
        }

        $pwdHashed = $emailExists["user"][0]["hashed_password"];
        $checkPwd = password_verify($password, $pwdHashed);

        if ($checkPwd === false) {
            echo "Wrong Password";
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
        $response["user"] = array();
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo json_encode("Email didn't found");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email,);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            $users = array();

            require_once '../entity_functions/userfunc.php';
            $userfunc = new userfunc($db);
            
            $users["nickname"] = $row["nickname"];
            $users["first_name"] = $row["first_name"];
            $users["last_name"] = $row["last_name"];
            $users["hashed_password"] = $row["hashed_password"];
            $users["email"] = $row["email"];
            $users["picture"] = $row["picture"];
            $users["id"] = $row["id"];
            $users["bio"] = $row["bio"];
            $users["instagram"] = $row["instagram"];
            $users["twitter"] = $row["twitter"];
            $users["twitch"] = $row["twitch"];
            $users["unsplash"] = $row["unsplash"];
            $users["followers_count"] = $userfunc->getFollowersCount($row["id"]);
            $users["followed_count"] = $userfunc->getFollowed($row["id"]);
            $users["followers"] = $userfunc->getMyUsersMobile($row["id"]);

            array_push($response["user"], $users);

            return $response;
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
