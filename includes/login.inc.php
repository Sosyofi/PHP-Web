<!-- Bu kısım, formlardan gelen $_POST değerlerini değişkene atayacağımız kısım. -->
<?php

if(isset($_POST['submit'])){
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
    require_once 'db.inc.php';
    $db = new DBController();

    // loginfunc.php bağlantısı ve nesnesinin oluşturulması
    require_once 'functions/form_functions/loginfunc.php';
    $login = new login($db);

    // user nesnesinin oluşturulması
    require_once 'entity/user.php';
    $user = new user();
    
    // atama işlemleri
    $user->set_name($_POST['isim']);

}else{
    header('location: ../../index.php');
    exit();
}