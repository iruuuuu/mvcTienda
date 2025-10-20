<?php

class product {
    private $id;
    private $name;
    private $description;
    private $stock;


    // Constructor
    public function __construct($id, $name, $description, $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->stock = $stock;
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


}

?>
