<?php

session_start();
if (empty($_POST["novaSenha"]) || empty($_POST["senhaAtual"]) || empty($_POST["repeteSenha"])) {
    $_SESSION["cad-atendente"] = "vazio";
}
else{
    if($_POST["novaSenha"] == $_POST["repeteSenha"]){
        if($_SESSION["senha"]==$_POST["senhaAtual"]){

            $_SESSION["senha"] = $_POST["senhaAtual"];
    
            $email = $_POST["email"];
            $passAtual = $_POST["senhaAtual"];
            $pass = $_POST["repeteSenha"];
            $idPerfil = $_SESSION["idPerfil"];
            

            include "../conexaoBD.php";
            $sql= "UPDATE `perfil` SET `senha`='$pass' WHERE `idPerfil`='$idPerfil'";
            echo $sql;
            
            $result = $conn->query($sql);

            $_SESSION["senha"]=$pass;
            $_SESSION["cad-atendente"] = "sucesso";
        }
        else{
            $_SESSION["cad-atendente"] = "SenhaAtualErrada";
        }
    }
    else{
        $_SESSION["cad-atendente"] = "diferente";
    }
}
header("Location: ../../atualizar-senha.php");