<?php
class userfunc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if ($db->get_conn() === null) {
            return null;
        }
        $this->db = $db;
    }

    function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }
    function getUsers($id)
    {
        $sql = "SELECT * FROM users WHERE id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $resultArray = array();
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $resultArray[] = $row;
            }
            return $resultArray;
        }
    }

    function getMyUsersMobile($id)
    {
        $response = array();
        $sql = "SELECT * FROM followers WHERE follower_id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response["follower_user"] = $this->getUser($row["user_id"]);
                $response["followers_count"] = $this->getFollowersCount($row["follower_id"]);
            }
            return $response;
        }
    }

    function getFollowersCount($id)
    {
        $sql = "SELECT * FROM followers WHERE follower_id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    }

    function getFollowed($id)
    {
        $sql = "SELECT * FROM followers WHERE user_id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    }

    // Deneme Amaçlı Fonksiyon Çalışır durumda değil. 
    // $follower_first_name, $follower_last_name, $follower_nickname follower dan alınacak.
    // function followUser($user_id, $follower_id, $follower_first_name, $follower_last_name, $follower_nickname)
    // {
    //     $sqlSelect = "SELECT * FROM users WHERE id =" . $follower_id . ",";
    //     $result = mysqli_query($this->db->get_conn(), $sqlSelect);
    //     $resultCheck = mysqli_num_rows($result);
    //     $resultArray = array();
    //     echo $resultArray;
    //     exit();
    //     if ($resultCheck > 0) {
    //         return $resultArray;
    //     }

    //     $sql = "INSERT INTO followers (user_id, follower_id, follower_first_name, follower_last_name, follower_nickname) VALUES (?, ?, ?, ?, ?);";
    //     $stmt = mysqli_stmt_init($this->db->get_conn());
    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
    //         header("location: ../signup.php?error=stmtfailed");
    //         exit();
    //     }

    //     mysqli_stmt_bind_param($stmt, "iisss",  $user_id, $follower_id, $follower_first_name, $follower_last_name, $follower_nickname);
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_close($stmt);
    //     header("location: ../signup.php?error=success");
    //     exit();
    // }

    // Search Bar
}
