<?php
    session_start();
    
    include "conexaoBD.php";

    if(isset($_SESSION["login-cliente"]) && $_SESSION["login-cliente"]=="off"){

        //cadastro do cliente
        if(isset($_POST["bairro"]) && isset($_POST["endereco"])){
            // Realizar o cadastro do cliente no bd
            $nome = $_SESSION["nome-cliente"];
            $telefone = $_SESSION["telefone-cliente"];
            $endereço = $_POST["endereço"];
            $bairro = $_POST["bairro"];
    
            $sql = "INSERT INTO `cliente`(`nome`, `telefone`, `endereco`, `bairro`) VALUES ('$nome','$telefone','$endereço','$bairro')";
            echo $sql;
        }
        //fim do cadastro do cliente

    }
        $idCliente = $_SESSION["id-cliente"];
        $idTaxa = $_SESSION["idBairro"];
        $total = $_SESSION["total"];
        
        $hoje = date('Y/m/d');

        $sql = "INSERT INTO `pedido`(`idCliente`, `idTaxa`,`valorTotal`,`dataPedido`,`local`,`status`) VALUES ('$idCliente',$idTaxa,'$total','$hoje','on-line',true)";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
           // $_SESSION["cad-bebida"] = "sucesso";
            
        }
    
        
        $conn->close();
    
 //  header("Location: ../enviar-pedido.php");
?>

        
    
