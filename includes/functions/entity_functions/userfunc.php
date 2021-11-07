<!-- Kullanıcılar üzerinden yapılacak işlemler için bu dosya kullanılacak ve bu dosyada fonksiyonlar bulunacak. -->
<?php
session_start();
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
    function getMyInfo()
    {
        $sql = "SELECT * FROM users WHERE id =" . getUserId() . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }
    function searchUser($user)
    {
        $sqlFollower = "SELECT * FROM users WHERE nickname LIKE '%$user%';";
        $result = mysqli_query($this->db->get_conn(), $sqlFollower);
        $resultCheck = mysqli_num_rows($result);
        $response = array();
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
        return $response;
        }
        return $response;
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
    function getUserUN($nickname)
    {
        $sql = "SELECT * FROM users WHERE nickname = '". $nickname ."';";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }
    function isItFollower($userid)
    {
        $sql = "SELECT * FROM followers WHERE follower_id = ". $userid ." AND user_id = " . getUserId() . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            return true;
        }else {
            return false;
        }
    }

    function changeFollowerStat($userid, $platform, $username)
    {
        $sql = "SELECT * FROM followers WHERE follower_id = ". $userid ." AND user_id = " . $_SESSION["userid"] . ";";

        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if ($resultCheck > 0) {
            $sql = "DELETE FROM followers WHERE id=". mysqli_fetch_object($result)->id ."";
            if ($this->db->get_conn()->query($sql) === TRUE) {
                header('location: ../user_profile.php?username=' . $username . '&platform=' . $platform);
                exit();
            } else {
                header('location: ../user_profile.php?username=' . $username . '&platform=' . $platform);
                exit();
            }
        }else {
            $sql = "INSERT INTO followers (user_id, follower_id) VALUES (?, ?);";
            $stmt = mysqli_stmt_init($this->db->get_conn());
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../index.php?error=stmtfailed");
                exit();
            }    
            mysqli_stmt_bind_param($stmt, "ii", $_SESSION["userid"] ,$userid);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header('location: ../user_profile.php?username=' . $username . '&platform=' . $platform);
            exit();
        }
    }
    function getMyUsers()
    {
        $sql = "SELECT * FROM followers WHERE user_id =" . getUserId() . ";";
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

    function getMyFollowersCount()
    {
        $sql = "SELECT * FROM followers WHERE follower_id =" . getUserId() . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    }
    function getFollowersCount($id)
    {
        $sql = "SELECT * FROM followers WHERE follower_id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        return $resultCheck;
    }

    function getMyFollowed()
    {
        $sql = "SELECT * FROM followers WHERE user_id =" . getUserId(). ";";
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
    function getUserId(){
        return $_SESSION["userid"];
    }
    function getUserName(){
        return $_SESSION["username"];
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
