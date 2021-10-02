<!-- Bu index.php dosyası, uygulama ilk açıldığında kullanıcının karşısında çıkacak login ekranıdır. -->

<?php
include_once 'header.php'; 
session_start();
//Header kısmının index.php sayfasına dahil edilmesi.
if(isset($_SESSION["userid"])){
    include_once 'main.php';
} else{
    include_once 'login_signup.php';
}
include_once 'footer.php'; //Footer kısmının index.php sayfasına dahil edilmesi.
?>