<!-- Kullanıcılar üzerinden yapılacak işlemler için bu dosya kullanılacak ve bu dosyada fonksiyonlar bulunacak. -->
<?php
class socialfunc
{
    function getInstagramUser($userName)
    {
        $userinfo = file_get_contents('https://www.instagram.com/'. $userName .'/?__a=1');
        $id = json_decode($userinfo)->graphql->user->id;
        $userpostsjson = file_get_contents('https://instagram.com/graphql/query/?query_id=17888483320059182&id='. $id .'&first=12');
        $userposts = json_decode($userpostsjson)->data->user->edge_owner_to_timeline_media->edges;

        return $userposts;
    }
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
    
    function getInstagramPic($userName)
    {
        $pics = file_get_contents("https://greatfon.com/v/bestami_sarikaya" );
        preg_match_all('@<div class="content__item grid-item card"><div class="content__img-wrap"><a href=(.*?)</a>@si',$pics, $pic);
        $imgs = array();
        foreach($pic[0] as $item){
            preg_match_all('@src="(.*?)">@si',$item, $oneofpic);
            $imgs[] =  $oneofpic[1][0];
        }
        return $imgs;
    }
    
}
