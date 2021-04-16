<?php
    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }
    if(isset($_POST["status"])){
    $status = $_POST["status"];
    }

    include "conexaoBD.php"; 
        
    $sql = "UPDATE `pedido` SET `status`='$status' WHERE `idPedido`= '$id'";

    
    $conn->query($sql);
    ?>