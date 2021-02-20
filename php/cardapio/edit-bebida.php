<?php

    session_start();
    if(empty($_POST["nome_bebida"]) || empty($_POST["preco"])){// Verificar se o campo está vazio
        $_SESSION["edit"] = "vazio";   
    }
    else{
        $nome_bebida = $_POST["nome_bebida"];
        $preco = str_replace(",",".",$_POST["preco"]);
        $idBebida = $_GET["idBebida"];


        include "../conexaoBD.php"; 

        $sql = "UPDATE bebida SET nome='$nome_bebida',preco=$preco WHERE idBebida=$idBebida";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["edit"] = "sucesso";
            
        } else {
            $teste = explode(" ",mysqli_error($conn));
            
            if($teste[0]=="Duplicate"){// Testar se ja estar duplicado
                $_SESSION["edit"] = "duplicado";
                
            }
        }
        
        $conn->close();
    }
    echo $sql;
    header("Location: ../../gerencia-cardapio.php");
?>