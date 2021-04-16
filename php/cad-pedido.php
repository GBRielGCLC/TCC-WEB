<?php
    session_start();
    
    include "conexaoBD.php";

    if(isset($_SESSION["login-cliente"]) && $_SESSION["login-cliente"]=="off"){

        //cadastro do cliente
        if(isset($_POST["bairro"]) && isset($_POST["endereco"])){
            // Realizar o cadastro do cliente no bd
            $nome = $_SESSION["nome-cliente"];
            $telefone = $_SESSION["telefone-cliente"];
            $endereco = $_POST["endereco"];
            $bairro = $_POST["bairro"];
    
            $sql = "INSERT INTO `cliente`(`nome`, `telefone`, `endereco`, `bairro`) VALUES ('$nome','$telefone','$endereco','$bairro')";
            echo $sql;
            if (mysqli_query($conn, $sql)) {

                $sql="SELECT idCliente FROM `cliente` WHERE `telefone` = '$telefone'";
                $result = $conn->query($sql);   
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $idCliente = $row["idCliente"];
                            
                     
                        }
                    }
            }
        }
        ///fim do cadastro do client

    }else{
        $idCliente = $_SESSION["id-cliente"];
    }
        $idTaxa = $_SESSION["idBairro"];
        $total = $_SESSION["total"];
    


        $hoje = date('Y/m/d');
        echo $idTaxa;
        
        $sql = "INSERT INTO `pedido`(`idCliente`, `idTaxa`,`valorTotal`,`dataPedido`,`local`,`status`) VALUES ('$idCliente',$idTaxa,'$total','$hoje','on-line','aguardando')";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
           // $_SESSION["cad-bebida"] = "sucesso";
            
        }
    
        
        $conn->close();
    
  // header("Location: ../index.php");
?>

        
    
