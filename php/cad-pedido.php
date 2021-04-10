<?php
    session_start();
    
    include "../conexaoBD.php";

    if(isset($_SESSION["login-cliente"]) && $_SESSION["login-cliente"]=="on"){

        $idCliente = $_SESSION["id-cliente"];
        $idTaxa = $_SESSION["idBairro"];
        $total = $_SESSION["total"];

        $sql = "INSERT INTO `pedido`(`idCliente`, `idTaxa`,`valorTotal`,`local`,`status`) VALUES ('$idCliente',$idTaxa,'$total',`on-line`,`true`)";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-bebida"] = "sucesso";
            
        }
    
        
        $conn->close();
    }

   header("Location: ../../cadastro-cardapio.php#cad-bebida");
?>

        
    
