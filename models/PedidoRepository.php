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
        $db = Connection::connect();
        $stmt = $db->prepare("INSERT INTO pedido (productId, userId) VALUES (?, ?)");
        $stmt->bind_param("ii", $productId, $userId);
        if ($stmt->execute()) {
            $id = $db->insert_id;
            $stmt->close();
            return $id;
        }
        $stmt->close();
        return false;
    }

    public static function deletePedido($id){
        $db = Connection::connect();
        $stmt = $db->prepare("DELETE FROM pedido WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        }
        $stmt->close();
        return false;
    }
}