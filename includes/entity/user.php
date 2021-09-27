<!-- Kullanıcıların özelliklerinin bulunduğu dosya -->
<?php

class user
{
 private $name = null;

 public function get_name(){
    return $this->name;
 }
 public function set_name($name){
    $this->name = $name;
 }
}