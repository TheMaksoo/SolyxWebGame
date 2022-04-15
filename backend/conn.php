<?php
   require 'vendor/autoload.php';
   use MongoDB\Client as Mongo;

   $user = "admin";
   $pwd = 'password';

   $mongo = new Mongo("mongodb://localhost:27017/?readPreference=primary&appname=MongoDB%20Compass%20Community&ssl=false");
   $db = $mongo->solyx;
   $db_users = $db->users;

?>