<?php

class Autoloader {
  static function register(){
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  static function autoload($class){
    include(__DIR__.'\\'.$class.'.class.php');
  }
}

 ?>
