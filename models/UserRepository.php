<?php

class userRepository{

   
   //Tomar usuario por id
   public static function getUserByID($id) {
      $db = Connection::connect();
      $q = "SELECT id, username, avatar, role FROM users WHERE id = $id";
      $result = $db->query($q);
      if($row = $result->fetch_assoc()){
         return new User($row['id'], $row['username'], $row['avatar'], $row['role'],);
      }else return false;
   }

   //Crear usuario
   public static function createUser($username, $password, $role, $avatar) {
      $db = Connection::connect();
      $q='INSERT INTO users (username, password, avatar, role) VALUES ("'.$_POST['username'].'", "'.md5($_POST['password']).'", "'.$_POST['avatar'].'", "'.  (int)0  .'")';
        if($db->query($q)){
            $_SESSION['user'] = new User($db->insert_id, $_POST['username'], $_POST['avatar'], 0);
         } else {
            echo "Error: could not register user.";
         }
   }

   //login usuario
   public static function login($username, $password) {
      $db = Connection::connect();
      $q='SELECT * FROM users WHERE username="'.$_POST['username'].'" AND password="'.md5($_POST['password']).'"';
      $result = $db->query($q);
      if($row=$result->fetch_assoc()){
        $_SESSION['user'] = new User($row['id'], $row['username'], $row['avatar'], $row['role']);
         return true;
      } else {
         return false;
      }
   }
   
   
}    

    

