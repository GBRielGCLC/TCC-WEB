<?php
    session_start();
    if(empty($_POST["nome"]) || empty($_POST["telefone"])){// Verificar se o campo está vazio
        $_SESSION["log-cliente"] = "vazio";
    }
    else{
        include "conexaoBD.php"; 
        
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];

        $sql="SELECT * FROM `cliente` WHERE `telefone` = '$telefone'";
        $result = $conn->query($sql);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $_SESSION["login-cliente"]= "on";
            $_SESSION["nome-cliente"] = $row["nome"];
            $_SESSION["telefone-cliente"] = $row["telefone"];
            $_SESSION["endereco-cliente"] = $row["endereco"];
            $_SESSION["bairro"] = $row["bairro"];
            }
        } else {
    
            $_SESSION["endereco-cliente"] = "";
            $_SESSION["bairro"] = "";

    
            $_SESSION["nome-cliente"] = $nome;
            $_SESSION["telefone-cliente"] = $telefone;

            $_SESSION["login-cliente"]= "off";
        }
    }
    header("Location: ../enviar-pedido.php");
    