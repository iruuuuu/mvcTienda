<?php

class pedidoRepository{

    public static function getProductosByUserid($userId){
        $db = connection::connect();
        $q = "SELECT * FROM pedido WHERE userId = $userId";
        $result = $db->query($q);
        $productos = [];
        while($row = $result->fetch_assoc()){
            $productos[] = new pedido($row['id'], $row['productId'], $row['userId']);
        }
        return $productos;
    }

    public static function addPedido($productId, $userId){
        $db = connection::connect();
        $q = "INSERT INTO pedido (productId, userId) VALUES ($productId, $userId)";
        if ($result = $db->query($q)) {
            return $db->insert_id;
        }
        return false;
    }

    public static function deletePedido($id){
        $db = connection::connect();
        $q = "DELETE FROM pedido WHERE id = $id";
        if ($result = $db->query($q)) {
            return true;
        }
        return false;
    }
}