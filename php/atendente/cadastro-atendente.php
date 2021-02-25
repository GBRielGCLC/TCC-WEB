<?php

session_start();
if (empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["senha"]) || empty($_POST["repeteSenha"])) {
    $_SESSION["cad-atendente"] = "vazio";   
}
else{
    if($_POST["senha"] == $_POST["repeteSenha"]){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $pass = $_POST["repeteSenha"];
        
        echo $pass."|";

        include "../conexaoBD.php";
        $sql= "INSERT INTO `perfil`(`nome`, `e-mail`, `senha`, `adm`) VALUES ('$nome','$email','$pass',false)";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
            $_SESSION["cad-atendente"] = "sucesso";
            
        }

    }else{
        $_SESSION["cad-atendente"] = "diferente";
    }
}
header("Location: ../../atendente.php");