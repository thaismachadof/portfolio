<?php

$pedido = $_GET['pedido'];

include('phpqrcode/qrlib.php');
QRcode::png($pedido);

?>