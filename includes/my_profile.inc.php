<?php

if (isset($_POST['submit'])) {
    
    // veri tabanı bağlantısı ve nesnesinin oluşturulması
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/entity_functions/myprofilefunc.php';
    $myprofile = new myprofilefunc($db);
    // atama 
    
    if($_FILES['image']['name'] !== ""){
         $imageType = $_FILES['image']['type'];
         $filePath = $_FILES['image']['tmp_name'];
         $data = file_get_contents($_FILES['image']['tmp_name']);
         
            if(substr($imageType,0,5) == "image"){
                
                    $myprofile->updatePP($data,$_POST['bio'], $_POST['twitchUN'], $_POST['unsplashUN'], $_POST['instagramUN'], $_POST['twitterUN']);
                header('location: ../my_profile.php?error=success');
        }else{
            header('location: ../my_profile.php?error=invalidFile');
            exit();
        }
    }
    $myprofile->updateUN($_POST['bio'], $_POST['twitchUN'], $_POST['unsplashUN'], $_POST['instagramUN'], $_POST['twitterUN']);
} else {
    header('location: ../my_profile.php');
    exit();
}
