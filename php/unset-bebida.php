<?php
session_start();

if(isset($_POST["chave"])){
    if(isset($_SESSION["carrinho"])){
    unset($_SESSION["carrinho"][$_POST["chave"]]);
}
}
header("Location: ../fazer-pedido.php");
?>
