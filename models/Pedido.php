<?php

class pedido{
    private $id;
    private $productId;
    private $userId;

    public function __construct($id, $productId, $userId){
        $this->id = $id;
        $this->productId = $productId;
        $this->userId = $userId;
    }

    public function getId(){
        return $this->id;
    }

    public function getProductId(){
        return $this->productId;
    }

    public function getUserId(){
        return $this->userId;
    }

}


