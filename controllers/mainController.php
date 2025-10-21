<?php
//cargar modelo
require_once('models/User.php');
require_once('models/Product.php');
require_once('models/Pedido.php');

require_once('models/UserRepository.php');
require_once('models/ProductsRepository.php');
require_once('models/PedidoRepository.php');


session_start();
//consultas a la base de datos
$db = Connection::connect();

//inicializar sesión
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = false;
}

if(isset($_GET['c'])){
    require_once('controllers/'.$_GET['c'].'Controller.php');
}
else {
    if(!($_SESSION['user'])){
    require_once('controllers/productsController.php');}
    else {
        require_once('controllers/productsController.php');
    }
}