<?php
require 'vendor/autoload.php';
function getPics($username){
    \Unsplash\HttpClient::init([
        'applicationId'	=> 'Access Key',
    ]);
    $user = \Unsplash\User::find($username);
   $photos = $user->photo();
   return $photos;
//    echo print_r($photos[2]['urls']['full']);
}
