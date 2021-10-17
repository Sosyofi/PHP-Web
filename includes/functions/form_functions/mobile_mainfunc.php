<?php
class mainfunc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if ($db->get_conn() === null) {
            return null;
        }
        $this->db = $db;
    }        

    public function getProfile($id){
        $response = array();
        $sql = "SELECT * FROM users WHERE id = ?;";
        $stmt = mysqli_stmt_init($this->db->get_conn());

        $users = array();
        $response["user"] = array();

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $response["success"] = 0;
            $response["user"] = array();
            $response["users"] = array();
            $response["message"] = "Email bulunamadı";
            echo json_encode($response);
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $id,);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {

            $users["id"] = $row["id"];
            $users["email"] = $row["email"];
            $users["nickname"] = $row["nickname"];
            $users["first_name"] = $row["first_name"];
            $users["last_name"] = $row["last_name"];
            $users["picture"] = $row["picture"];
            $users["bio"] = $row["bio"];
            $users["instagram"] = $row["instagram"];
            $users["twitter"] = $row["twitter"];
            $users["twitch"] = $row["twitch"];
            $users["unsplash"] = $row["unsplash"];
            $users["followers_count"] = $this->getFollowersCount($row["id"]);
            $users["followed_count"] = $this->getFollowed($row["id"]);

            $response["user"] = $users;
            $response["success"] = 1;
            $response["users"] = $this->getMyUsersMobile($row["id"]);
            $response["message"] = "İşlem Başarılı";
            echo json_encode($response);
            exit();
        } else {
            return true;
        }
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
                $resultArray["id"] = $row["id"];
                $resultArray["nickname"] = $row["nickname"];
                $resultArray["instagram"] = $row["instagram"];
                $resultArray["twitter"] = $row["twitter"];
                $resultArray["twitch"] = $row["twitch"];
                $resultArray["unsplash"] = $row["unsplash"];
                $resultArray["followers_count"] = $this->getFollowersCount($id);
            }
            return $resultArray;
        }
    }

    function getMyUsersMobile($id)
    {
        $response = array();
        $sql = "SELECT * FROM followers WHERE user_id =" . $id . ";";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $a = 0;
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response[$a] = $this->getUsers($row["follower_id"]);
                $a++;
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

}
