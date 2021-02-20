<?php

    session_start();
    if(empty($_POST["tamanho"]) || empty($_POST["preco"])){// Verificar se o campo está vazio
        $_SESSION["edit"] = "vazio";
    }
    else{
        $tamanho = $_POST["tamanho"];
        $preco = str_replace(",",".",$_POST["preco"]);
        $qtdeSabor = $_POST["qtdeSabor"];
        $idPizza = $_GET["idPizza"];


        include "../conexaoBD.php"; 

        $sql = "UPDATE tamanho SET nome='$tamanho',preco=$preco,qtdeSabor=$qtdeSabor WHERE idPizza=$idPizza";
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
    header("Location: ../../gerencia-cardapio.php");
?>