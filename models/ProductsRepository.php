<?php
class ProductsRepository{
        public static function getProductById($idProduct) {
        $db = Connection::connect();
        $q = "SELECT * FROM products WHERE id=" . $idProduct;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new product($row['id'], $row['name'], $row['description'], $row['stock'],$row['precio'], $row['imagen'] );
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
    $db = Connection::connect();
    $q = 'SELECT * FROM products';
    $result = $db->query($q);
    $products = [];
    while ($row = $result->fetch_assoc()) {
            $products[] = new Product($row['id'], $row['name'], $row['description'], $row['stock'], $row['imagen'], $row['precio']);
    }
    return $products;

}

public static function addProduct( $name, $description, $stock, $price, $imagen) {
    if (self::isUserAdmin()) {
        $db = Connection::connect();
        $q = "INSERT INTO products  VALUES ( NULL, '" . $name . "', '" . $description . "', '" . $stock . "', '" . $price . "', '" . $imagen . "')";
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
        $q = "DELETE FROM products WHERE id=" . $id;
        if ($result = $db->query($q))
            return true;
        else
            return false;
    }
    return false;
}

}
