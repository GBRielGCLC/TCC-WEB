<?php
    session_start();
    if(empty($_POST["tamanho"]) || empty($_POST["preco"])){// Verificar se o campo está vazio
        $_SESSION["cad-tamanho"] = "vazio";
    }
    else{
        $tamanho = $_POST["tamanho"];
        $preco = str_replace(".","",$_POST["preco"]);
        $preco = str_replace(",",".",$preco);
        $qtdeSabor = $_POST["qtdeSabor"];

        include "../conexaoBD.php";
        $sql = "SELECT * FROM `tamanho` WHERE `nome` = '$tamanho'";
        $result = $conn->query($sql);   
        if ($result->num_rows > 0) {
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