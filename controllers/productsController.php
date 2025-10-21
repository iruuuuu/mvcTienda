<?php

// Delete Subject
if(isset($_GET['delete'])){
    ProductsRepository::deleteProduct($_GET['delete']);
    header('location:index.php');
    exit();
}

// Add new Product
if(isset($_POST["name"]) && isset($_POST["description"])){
    $title = $db->real_escape_string($_POST['name']);
    $description = $db->real_escape_string($_POST['description']);
    $price = $db->real_escape_string($_POST['price']);
    $image = $db->real_escape_string($_POST['image']);
    ProductsRepository::addProduct($title, $description, $price, $image);
    header('location:index.php');
    exit();
}

// Show new Subject form
if(isset($_GET["newProduct"])){
    require_once 'views/newProduct.phtml';
    exit();
}

// Show single Subject
if(isset($_GET['id'])){
    $Subject = ProductsRepository::getProductById($_GET['id']);
    require_once 'views/showSubject.phtml';
    exit();
}
// Show Subject list
else {
    $Products = ProductsRepository::getProduct();
    require_once 'views/index.phtml';
    exit();
}