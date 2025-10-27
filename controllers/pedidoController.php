<?php

//show product list

$productos = pedidoRepository::getPedidosByUserid($_SESSION['user']->getId() ); 
require_once 'views/pedidoView.phtml';
exit();
