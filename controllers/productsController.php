<?php
require_once('models/User.php');
require_once('models/UserRepository.php');



session_start();

if (isset($_GET['c'])) {
    require_once('controllers/' . $_GET['c'] . 'Controller.php');
}

if (!isset($_SESSION['user'])) {
    require_once 'views/loginView.phtml';
    die();
}

//si ha iniciado sesión

// cargar la vista
require_once 'views/productView.phtml';