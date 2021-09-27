<!-- Bu dosya, signup.inc.php dosyasına gelen verilerin işleme tabi tutulacağı ve bu işlemlerin yazıldığı fonksiyonların bulunduğu dosyadır. -->

<?php

class signup
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if($db->get_conn() === null){
            return null;
        }
        $this->db = $db;
    }

    // Veri tabanı fonksiyonları bundan sonra yazılacak.

}