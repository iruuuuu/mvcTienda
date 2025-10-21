<?php
class ProductsRepository{
        public static function getProductById($idProduct) {
        $db = Connection::connect();
        $q = "SELECT * FROM post WHERE id=" . $idProduct;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new product($row['id'], $row['name'], $row['description'], $row['stock']);
        }
        return null;
    }


private static function isUserAdmin() {
    if (isset($_SESSION['user']) && is_object($_SESSION['user']) && $_SESSION['user']->isAdmin()) {
        return true;
    }
    return false;
}

public static function getProduct() {
    if (self::isUserAdmin()) {
        $db = Connection::connect();
        $q = 'SELECT * FROM products ORDER BY created_at DESC';
        $result = $db->query($q);
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = new Product($row['id'], $row['name'], $row['description'], $row['stock']);
        }
        return $products;
    }
    return [];
}

public static function addProduct($id, $name, $description, $stock) {
    if (self::isUserAdmin()) {
        $db = Connection::connect();
        $q = "INSERT INTO product  VALUES ( NULL, '" . $name . "', '" . $description . "', '" . $stock . "')";
        if ($result = $db->query($q))
            return $db->insert_id;
        else
            return false;
    }
    return false;
}

public static function deleteProduct($id) {
    if (self::isUserAdmin()) {
        $db = Connection::connect();
        $q = "DELETE FROM post WHERE id=" . $id;
        if ($result = $db->query($q))
            return true;
        else
            return false;
    }
    return false;
}

}
