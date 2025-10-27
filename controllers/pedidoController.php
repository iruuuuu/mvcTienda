<?php
// Obtener los pedidos del usuario desde la base de datos
$pedidos = PedidoRepository::getPedidosByUserid($_SESSION['user']->getId());



// Redirigir si el usuario no está logueado
if (!isset($_SESSION['user']) || !is_object($_SESSION['user'])) {
    header('Location: index.php?c=user&login=1');
    exit();
}

// Cargar la vista para mostrar los pedidos
require_once 'views/pedidoView.phtml';
exit();