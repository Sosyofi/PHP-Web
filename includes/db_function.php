<!-- Burası global olarak kalacak ve sınıf oluşturulmayacak. Entity'lerin gerçekleştirilecek işlemleri bu dosya üzerinden yönetilecek. -->
<?php

require_once 'db.inc.php';
$db = new DBController();

require_once 'includes/functions/entity_functions/userfunc.php';
$userfunc = new userfunc($db);

require_once 'includes/functions/entity_functions/socialfunc.php';
$socialfunc = new socialfunc();

function getUserName(){
    return $GLOBALS['userfunc']->getUserName();
}
function getUserId(){
    return $GLOBALS['userfunc']->getUserId();
}
function getMyFollowersCount(){
    return $GLOBALS['userfunc']->getMyFollowersCount();
}
function getFollowersCount($id){
    return $GLOBALS['userfunc']->getFollowersCount($id);
}
function getMyFollowed(){
    return $GLOBALS['userfunc']->getMyFollowed();
}
function getFollowed($id){
    return $GLOBALS['userfunc']->getFollowed($id);
}
function getMyUsers(){
    return $GLOBALS['userfunc']->getMyUsers();
}
function getUsers($id){
    return $GLOBALS['userfunc']->getUsers($id);
}
function getUser($id){
    return $GLOBALS['userfunc']->getUser($id);
}
function getUserUN($nickname){
    return $GLOBALS['userfunc']->getUserUN($nickname);
}
function getMyInfo(){
    return $GLOBALS['userfunc']->getMyInfo();
}
function getFollowers(){
    return $GLOBALS['userfunc']->getFollowers();
}


function getTwitchLiveStatus($userName){
    return $GLOBALS['socialfunc']->getTwitchLiveStatus($userName);
}

//Nesne oluşturma işlemleri gerçekleştirilecek ve nesnelerin fonksiyonları kullanılacak.