<?php
    session_start();
    if(empty($_POST["tamanho"]) || empty($_POST["preco"])){// Verificar se o campo está vazio
        $_SESSION["cad-tamanho"] = "vazio";
    }
    else{
        $tamanho = $_POST["tamanho"];
        $preco = str_replace(",",".",$_POST["preco"]);
        $qtdeSabor = $_POST["qtdeSabor"];

        include "../conexaoBD.php"; 

        $sql = "INSERT INTO `tamanho`(`nome`, `preco`,`qtdeSabor`,`status`) VALUES ('$tamanho',$preco,$qtdeSabor,'on')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-tamanho"] = "sucesso";
            
        } else {
            $teste = explode(" ",mysqli_error($conn));
            
            if($teste[0]=="Duplicate"){// Testar se ja estar duplicado
                $_SESSION["cad-tamanho"] = "duplicado";
                
            }
        }
        
        $conn->close();
    }
    header("Location: ../../cadastro-cardapio.php#cad-tamanho");
?>