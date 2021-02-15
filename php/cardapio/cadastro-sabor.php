<?php
    session_start();
    if(empty($_POST["sabor"])){// Verificar se o campo está vazio
        $_SESSION["cad-sabor"] = "vazio";

    }
    else{
        $nome = $_POST["sabor"];
        $desc = $_POST["desc"];
        $preco = str_replace(",",".",$_POST["preco"]);
        
        $i=0;
        foreach ($_POST["idPizza[]"] as $i) {
            $tam[$i] = $_POST["idPizza[$i]"];
            $i++;
        }
        
        include "php\conexaoBD.php";    

        $sql = "INSERT INTO sabor(nome,descricao,status,disponibilidade) VALUES('$nome','$desc','0','$tam')";
        
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-sabor"] = "sucesso";

        } else {
            $teste = explode(" ",mysqli_error($conn));
            
            if($teste[0]=="Duplicate"){// Testar se ja estar duplicado
                $_SESSION["cad-sabor"] = "duplicado";

            }
        }
        $conn->close();
    }
    header("Location: ../../cadastro-cardapio.php#cad-sabor");
    
?>