<?php

session_start();

if(empty($_POST["login"]) || empty($_POST["senha"])){
    $_SESSION["check"] = "vazio";
    header("Location: ../login_area.php");
}
else{
    include("conexaoBD.php");
    $login=$_POST["login"];
    $senha=$_POST["senha"];

    $sql = "SELECT `idPerfil`, `nome`, `e-mail`, `senha`, `adm` FROM `perfil` WHERE `e-mail`='$login' and `senha`='$senha'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $email = $row["e-mail"];
        $senha = $row["senha"];
        $_SESSION["adm"] = $row["adm"];
        
        $_SESSION["idPerfil"] = $row["idPerfil"];
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["e-mail"] = $email;
        $_SESSION["logou"] = "sim";

        header("Location: ../index.php");
        }
    }else{
        $_SESSION["check"] = "nao";
        $_SESSION["logou"] = "nao";
        header("Location: ../login_area.php");
    }
}
