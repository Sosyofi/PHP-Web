<?php
$nickname = array();
if (isset($_GET['searchuser'])) {
    require_once 'includes/db.inc.php';
    $db = new DBController();
    require_once 'includes/functions/entity_functions/userfunc.php';
    $userfunc = new userfunc($db);
    $nickname = $userfunc->searchUser($_GET['searchuser']);
    
}
else {
    $nickname = null;
}
