<?php

// Delete product
if(isset($_GET['delete'])){
    ProductsRepository::deleteProduct($_GET['delete']);
    header('location:index.php');
    exit();
}

// Add new Product
if(isset($_GET["createProduct"])){
    if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["stock"]) && isset($_POST["precio"])){
        $db = Connection::connect();
        
        //Comprobación de que imagen esta seteado, descarga del contenido y puesta el nombre
        if (isset($_FILES['imagen'])) {
            if (FileHelper::fileHandler($_FILES['imagen']['tmp_name'], 'public/products/' . $_FILES['imagen']['name'])){

               $imagen = $_FILES['imagen']['name'];
            };
        }else{
            $imagen = 'default.jpg';
        }

        $name = $db->real_escape_string($_POST['name']);
        $description = $db->real_escape_string($_POST['description']);
        $stock = $db->real_escape_string($_POST['stock']);
        $precio = $db->real_escape_string($_POST['precio']);

        ProductsRepository::addProduct($name, $description, $stock, $precio, $imagen);
        var_dump($imagen);
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

//añadir producto a "carrito"
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $userId = $_SESSION['user']->getId();
    // Esto debería ser para añadir al carrito, no directamente a pedidos.
    // Redirigimos al nuevo controlador de carrito.
    header('Location: index.php?c=carrito&action=add&id=' . $productId);
    header('location:index.php');
    exit();
}

// Show product list
$products = ProductsRepository::getProduct(); 
require_once 'views/productView.phtml';
exit();
