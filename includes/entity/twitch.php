<?php

class Twitch
{
    private $liveStats = null;
    private $userPicture = null;
    private $follower_id = null;

    public function get_id()
    {
        return $this->id;
    }
    public function set_id($id)
    {
        $this->id = $id;
    }
    public function get_user_id()
    {
        return $this->user_id;
    }
    public function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }
    public function get_follower_id()
    {
        return $this->follower_id;
    }
    public function set_follower_id($follower_id)
    {
        $this->follower_id = $follower_id;
    }
}
