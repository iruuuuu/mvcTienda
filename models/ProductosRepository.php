<?php
class ProductosRepository{
        public static function getProductById($idProduct) {
        $db = Connection::connect();
        $q = "SELECT * FROM post WHERE id=" . $idProduct;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new product($row['id'], $row['name'], $row['description'], $row['stock']);
        }
        return null;
    }

    public static function getProduct() {
        $db = Connection::connect();
        $q = 'SELECT * FROM post ORDER BY created_at DESC';
        $result = $db->query($q);
        $product = array();
        while ($row = $result->fetch_assoc()) {
            $product[] = new product($row['id'], $row['title'], $row['created_at'], $row['text'], $row['author'], $row['user_id']);
        }
        return $product;
    }

    public static function addPost($title, $text, $author, $user_id) {
        $db = Connection::connect();
        $date = date('Y-m-d H:i:s');
        $q = "INSERT INTO post VALUES (NULL, '" . $title . "', '" . $date . "', '" . $text . "', '" . $author . "', " . $user_id . ")";
        if ($result = $db->query($q))
            return $db->insert_id;
        else
            return false;
    }

    public static function deletePost($id) {
        $db = Connection::connect();
        $q = 'DELETE FROM post WHERE id=' . $id;
        return $db->query($q);
    }
}
