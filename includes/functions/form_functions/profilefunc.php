
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
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        header("location: ../index.php?error=success");
        exit();
    }

    public function profileDelete(){
        session_start();
        $sqlFollower = "DELETE FROM followers where user_id=".$_SESSION['userid'].";";
        $stmtFollower = mysqli_query($this->db->get_conn(), $sqlFollower);
        $sql = "DELETE FROM users where id=".$_SESSION['userid'].";";
        $stmt = mysqli_query($this->db->get_conn(), $sql);
        if (!$stmt && $stmtFollower) {
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        header("location: ../index.php?error=success");
        session_unset();
        session_destroy();
        exit();
    }
}
