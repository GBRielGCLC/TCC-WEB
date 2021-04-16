<?php
session_start();

if(isset($_POST["chave"])){
    if(isset($_SESSION["carrinho_pizza"])){
        unset($_SESSION["carrinho_pizza"][$_POST["chave"]]);
      
    }
}
header("Location: ../fazer-pedido.php");
?>
