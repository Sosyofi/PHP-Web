<!-- Kullanıcılar üzerinden yapılacak işlemler için bu dosya kullanılacak ve bu dosyada fonksiyonlar bulunacak. -->
<?php
class socialfunc
{
    function getTwitchLiveStatus($userName)
    {
        $content = file_get_contents("https://twitchtracker.com/" . strtolower($userName) );
        preg_match_all('@<span class="live-indicator label label-danger">(.*?)</span>@si',$content, $foto);
        $deneme1 = $foto[0][0];
        if($deneme1 == null){
            return null;
        }else{
            return "live";
        }
    }
    
    function getTwitterInfo($userName)
    {
        $twitterInfo = array();
        $twitter = file_get_contents("https://twitter.com/" . strtolower($userName));
        preg_match_all('@<img class="ProfileAvatar-image " src="(.*?)"@si',$twitter, $foto);
        preg_match_all('@<span class="ProfileNav-value" data-count=(.*?) data-is-compact@si',$twitter, $info);
        
        $twitterInfo[0] = $foto[1][0];
        $twitterInfo[1] = $info[1][1];
        $twitterInfo[2] = $info[1][0];
        return $twitterInfo;
    }
}
