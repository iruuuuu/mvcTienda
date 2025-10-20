<?php

class productos {
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

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getFechaCreacion() {
        return $this->creado_en;
    }

    public function getUsuarioId() {
        return $this->user_id;
    }


    public function getUltimaActividad() {
        return $this->ultima_actividad;
    }
}

?>
