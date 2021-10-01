<?php

class Follower
{
    private $id = null;
    private $user_id = null;
    private $follower_id = null;
    private $follower_first_name = null;
    private $follower_last_name = null;
    private $follower_nickname = null;

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
    public function get_follower_first_name()
    {
        return $this->follower_first_name;
    }
    public function set_follower_first_name($follower_first_name)
    {
        $this->follower_first_name = $follower_first_name;
    }
    public function get_follower_last_name()
    {
        return $this->follower_last_name;
    }
    public function set_follower_last_name($follower_last_name)
    {
        $this->follower_last_name = $follower_last_name;
    }
    public function get_follower_nickname()
    {
        return $this->follower_nickname;
    }
    public function set_follower_nickname($follower_nickname)
    {
        $this->follower_nickname = $follower_nickname;
    }
}
