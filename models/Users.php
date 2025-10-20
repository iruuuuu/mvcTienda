<?php

class users {
    private $id;
    private $username;
    private $password;
    private $avatar;
    private $rol;


    // Constructor
    public function __construct($id, $username, $password, $email, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
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

    public function getPassword() {
        return $this->password;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getRol() {
        return $this->rol;
    }

    // Metodo para verificar si es administrador
    public function isAdmin() {
        return $this->rol == 'admin';
    }

}

?>