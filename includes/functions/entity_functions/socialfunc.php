<?php

class socialfunc
{
    function getTwitchLiveStatus($twitchName)
    {
        $content = file_get_contents("https://twitchtracker.com/" . strtolower($twitchName));
        preg_match_all('@<span class="live-indicator label label-danger">(.*?)</span>@si', $content, $foto);
        $deneme1 = $foto[0][0];
        if ($deneme1 == null) {
            return null;
        } else {
            return "live";
        }
    }
}
