<?php

// Delete product
if(isset($_GET['delete'])){
    ProductsRepository::deleteProduct($_GET['delete']);
    header('location:index.php');
    exit();
}

// Add new Product
if(isset($_GET["createProduct"])){
    if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["stock"]) && isset($_POST["precio"]) && isset($_POST["imagen"])){
        $name = $db->real_escape_string($_POST['name']);
        $description = $db->real_escape_string($_POST['description']);
        $stock = $db->real_escape_string($_POST['stock']);
        $precio = $db->real_escape_string($_POST['precio']);
        $imagen = $db->real_escape_string($_POST['imagen']);
        ProductsRepository::addProduct($name, $description, $stock, $precio, $imagen);
        header('location:index.php');
        exit();
    }
}

// Show new product form
if(isset($_GET["newProduct"])){
    require_once 'views/newProductView.phtml';
    exit();
}

// // Show single Subject
// if(isset($_GET['id'])){
//     $Subject = ProductsRepository::getProductById($_GET['id']);
//     require_once 'views/showProduct.phtml';
//     exit();
//}



//show login form
if(isset($_GET['login'])){
    require_once 'views/loginView.phtml';
    exit();
}

//show register form
if(isset($_GET['register'])){
    require_once 'views/registerView.phtml';
    exit();
}

// Show product list
$products = ProductsRepository::getProduct(); 
require_once 'views/productView.phtml';
exit();
