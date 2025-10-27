<?php

class pedidoRepository{

    public static function getPedidosByUserid($userId){
        $db = connection::connect();
        $q = "SELECT * FROM pedido WHERE userId = $userId";
        $result = $db->query($q);
        $pedidos = [];
        while($row = $result->fetch_assoc()){
            $pedidos[] = new pedido($row['id'], $row['productId'], $row['userId']);
        }
        return $pedidos;
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