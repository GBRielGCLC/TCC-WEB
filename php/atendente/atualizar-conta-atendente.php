<?php

session_start();
if (empty($_POST["nome"]) || empty($_POST["email"])) {
    $_SESSION["cad-atendente"] = "vazio";   
}
else{

    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $idPerfil = $_SESSION["idPerfil"];
    include "../conexaoBD.php";
    $sql= "UPDATE `perfil` SET `nome`='$nome', `e-mail`='$email'  WHERE `idPerfil`= $idPerfil";
    echo $sql;
    
    
    if ($result = $conn->query($sql)) {

  
        $_SESSION["nome"] = $nome;
        $_SESSION["e-mail"] = $email;
        
        $_SESSION["cad-atendente"] = "sucesso";
        
    }else{  
        $_SESSION["cad-atendente"] = "erro";
    }
}
    header("Location: ../../conta.php");