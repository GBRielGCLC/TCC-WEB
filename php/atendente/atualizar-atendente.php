<?php

session_start();
if (empty($_POST["novaSenha"]) || empty($_POST["email"]) || empty($_POST["senhaAtual"]) || empty($_POST["repeteSenha"])) {
    $_SESSION["cad-atendente"] = "vazio";   
}
else{
    if($_POST["novaSenha"] == $_POST["repeteSenha"]){

        $email = $_POST["email"];
        $passAtual = $_POST["senhaAtual"];
        $pass = $_POST["repeteSenha"];
        
        

        include "../conexaoBD.php";
        $sql= "UPDATE `perfil` SET `senha`='$pass' WHERE `e-mail`='$email' and `senha`='$passAtual' and `adm`= false";
        echo $sql;
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["cad-atendente"] = "sucesso";
            
        }else{
            $_SESSION["cad-atendente"] = "SenhaAtualErrada";
        }
        }else{
            $_SESSION["cad-atendente"] = "diferente";
    }
}
   

    header("Location: ../../gerencia-atendente.php");