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
}
