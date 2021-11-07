<!-- Kullanıcılar üzerinden yapılacak işlemler için bu dosya kullanılacak ve bu dosyada fonksiyonlar bulunacak. -->
<?php
session_start();
class myprofilefunc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if ($db->get_conn() === null) {
            return null;
        }
        $this->db = $db;
    }
    function  updateUN($bio, $twitch, $unsplash, $instagram, $twitter)
    {
        session_start();
        $sql = "UPDATE users SET bio = ?, twitch = ?, unsplash = ?, instagram = ?, twitter = ? WHERE id = 5;";

        $stmt = mysqli_stmt_init($this->db->get_conn());
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $bio, $twitch, $unsplash, $instagram, $twitter);
        mysqli_stmt_execute($stmt);
        header('location: ../my_profile.php?error=UNUpdated');
        exit();
        mysqli_stmt_close($stmt);
    }
    function  updatePP($data,$bio, $twitch, $unsplash, $instagram, $twitter)
    {

        session_start();
        $sql = "UPDATE users SET picture = ? WHERE id = ?;";
        $stmt = mysqli_stmt_init($this->db->get_conn());
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $data, $_SESSION["userid"]);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        $sql = "UPDATE users SET bio = ?, twitch = ?, unsplash = ?, instagram = ?, twitter = ? WHERE id = 5;";

        $stmt = mysqli_stmt_init($this->db->get_conn());
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $bio, $twitch, $unsplash, $instagram, $twitter);
        mysqli_stmt_execute($stmt);
        header('location: ../my_profile.php?error=profileUpdated');
        exit();
        mysqli_stmt_close($stmt);
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
}
