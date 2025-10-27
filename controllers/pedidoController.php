<?php

//show product list
$pedidos = pedidoRepository::getPedidosByUserid($_SESSION['user']->getId() ); 
require_once 'views/pedidoView.phtml';
exit();