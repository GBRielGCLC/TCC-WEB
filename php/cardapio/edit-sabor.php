<?php

    session_start();
    if(empty($_POST["nome"]) || empty($_POST["descricao"])){// Verificar se o campo está vazio
        $_SESSION["edit"] = "vazio";
    }
    else{
        $nome_sabor = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $add = str_replace(".","",$_POST["add"]);
        $add = str_replace(",",".",$add);
        $idSabor = $_GET["idSabor"];


        include "../conexaoBD.php"; 

        $sql = "UPDATE sabor SET nome='$nome_sabor',precoAdd=$add, descricao='$descricao' WHERE idSabor=$idSabor";
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
    header("Location: ../../gerencia-cardapio.php#sabor");
?>