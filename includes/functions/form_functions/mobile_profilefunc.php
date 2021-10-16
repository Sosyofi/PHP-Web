<?php

class profile
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
    public function profileUpdate($query)
    {
        $stmt = mysqli_query($this->db->get_conn(), $query);
        if (!$stmt) {
            $response["success"] = 0;
            $response["message"] = "İşlem Başarısız";
            echo json_encode($response);
            exit();
        }
        $response = array();

        $response["success"] = 1;
        $response["message"] = "İşlem Başarılı";
        echo json_encode($response);
        exit();
    }

    public function profileDelete($id)
    {
        $sqlFollower = "DELETE FROM followers where user_id=" . $id . ";";
        $stmtFollower = mysqli_query($this->db->get_conn(), $sqlFollower);
        $sqlFollowed = "DELETE FROM followers where follower_id=" . $id . ";";
        $stmtfol = mysqli_query($this->db->get_conn(), $sqlFollowed);
        $sql = "DELETE FROM users where id=" . $id . ";";
        $stmt = mysqli_query($this->db->get_conn(), $sql);
        if (!$stmt && $stmtFollower && $stmtfol) {
            $response = array();

            $response["success"] = 1;
            $response["message"] = "İşlem Başarısız";
            echo json_encode($response);
            exit();
        }
        $response = array();

        $response["success"] = 1;
        $response["message"] = "İşlem Başarılı";
        echo json_encode($response);
        exit();
    }
}
