<?php
if (isset($_GET['twitter'])) {
    require_once 'db.inc.php';
    $db = new DBController();

    require_once 'functions/form_functions/mobile_mainfunc.php';
    $mainfunc = new mainfunc($db);

    require_once 'entity/user.php';
    $user = new User();

    require_once 'config.php';

    function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    function buildAuthorizationHeader($oauth)
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach ($oauth as $key => $value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

    $oauth_access_token = Config::$oauth_access_token;
    $oauth_access_token_secret = Config::$oauth_access_token_secret;
    $consumer_key = Config::$consumer_key;
    $consumer_secret = Config::$consumer_secret;

    $oauth = array(
        'screen_name' => $_GET['twitter'],
        'count' => 2,
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => time(),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_token' => $oauth_access_token,
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0'
    );

    $base_info = buildBaseString($url, 'GET', $oauth);
    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;

    // Make Requests
    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array(
        CURLOPT_HTTPHEADER => $header,
        //CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url . '?screen_name=' . $_GET['twitter'] . '&count=2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
    );

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    echo $json;
} else {
    $response = array();

    $response["success"] = 0;
    $response["message"] = "Hata";
    echo json_encode($response);
    exit();
}
