<?php

class user {
    private $id;
    private $username;
    private $avatar;
    private $rol;


    // Constructor
    public function __construct($id, $username, $avatar, $rol) {
        $this->id = $id;
        $this->username = $username;
        $this->avatar = $avatar;
        $this->rol = $rol;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getRol() {
        return $this->rol;
    }

    // Metodo para verificar si es administrador
    public function isAdmin() {
        return $this->rol == 1;
    }

}

?>