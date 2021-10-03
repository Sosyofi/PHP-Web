<!-- Kullanıcıların özelliklerinin bulunduğu dosya -->
<?php

class User
{
   private $id = null;
   private $nickname = null;
   private $first_name = null;
   private $last_name = null;
   private $email = null;
   private $hashed_password = null;
   private $picture = null;

   public function get_id()
   {
      return $this->id;
   }
   public function set_id($id)
   {
      $this->id = $id;
   }
   public function get_nickname()
   {
      return $this->nickname;
   }
   public function set_nickname($nickname)
   {
      $this->nickname = $nickname;
   }
   public function get_first_name()
   {
      return $this->first_name;
   }
   public function set_first_name($first_name)
   {
      $this->first_name = $first_name;
   }
   public function get_last_name()
   {
      return $this->last_name;
   }
   public function set_last_name($last_name)
   {
      $this->last_name = $last_name;
   }
   public function get_email()
   {
      return $this->email;
   }
   public function set_email($email)
   {
      $this->email = $email;
   }
   public function get_hashed_password()
   {
      return $this->hashed_password;
   }
   public function set_hashed_password($hashed_password)
   {
      $this->hashed_password = $hashed_password;
   }
   public function get_picture()
   {
      return $this->picture;
   }
   public function set_picture($picture)
   {
      $this->picture = $picture;
   }
}
