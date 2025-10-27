<?php

class product {
    private $id;
    private $name;
    private $description;
    private $stock;
    private $imagen;
    private $price;



    // Constructor
    public function __construct($id, $name, $description, $stock, $imagen, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->price = $price;
    }

    //Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getPrice() {
        return $this->price;
    }
}



?>
