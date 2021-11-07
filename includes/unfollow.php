<?php

require_once 'db.inc.php';
$db = new DBController();

require_once 'functions/entity_functions/userfunc.php';
$userfunc = new userfunc($db);
function getUserUN($nickname){
    return $GLOBALS['userfunc']->getUserUN($nickname);
}
function changeFollowerStat($followerUserName , $platform){
    return $GLOBALS['userfunc']->changeFollowerStat(getUserUN($followerUserName)->id, $platform, $followerUserName);
}
if(isset($_GET['username']) && isset($_GET['platform'])){
    changeFollowerStat($_GET['username'], $_GET['platform']);
}else{
    header('location: ../index.php');
    exit();
}