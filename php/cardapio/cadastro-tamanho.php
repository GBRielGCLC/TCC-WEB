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
        $sql = "SELECT * FROM `sabor` WHERE `nome` = '$nome'";
        echo$sql;
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-tamanho"] = "duplicado";

        } else {

            $sql = "INSERT INTO `tamanho`(`nome`, `preco`,`qtdeSabor`,`status`) VALUES ('$tamanho',$preco,$qtdeSabor,'on')";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION["cad-tamanho"] = "sucesso";
                
            }
        }
        $conn->close();
    }
    header("Location: ../../cadastro-cardapio.php#cad-tamanho");
?>