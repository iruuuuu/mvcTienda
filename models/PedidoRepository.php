<?php

class pedidoRepository{

    public static function getPedidosByUserid($userId){
        $db = Connection::connect();
        $pedidos = [];
        $stmt = $db->prepare("SELECT id, productId, userId FROM pedido WHERE userId = ?");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $pedidos[] = new Pedido($row['id'], $row['productId'], $row['userId']);
            }
        }
        $stmt->close();
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