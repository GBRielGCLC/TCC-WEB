<?php

session_start();

    include("conexaoBD.php");
    $login=$_POST["login"];
    $senha=$_POST["senha"];
    echo $login.$senha;
    $sql = "SELECT `idPerfil`, `nome`, `e-mail`, `senha`, `adm` FROM `perfil` WHERE `e-mail`='$login' and `senha`='$senha'";
    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $email = $row["e-mail"];
        $senha = $row["senha"];
        $_SESSION["adm"] = $row["adm"];

        $_SESSION["logou"] = 1;
        header("Location: ../index.php");
        }
    }else{
        $_SESSION["logou"] = 2;
       header("Location: ../login_area.php");
    }

/*
    if($_POST["login"]==$email && $_POST["senha"]==$senha){
        $_SESSION["logou"] = 1;
        header("Location: ../index.php");
    }
    else{
        $_SESSION["logou"] = 2;
        //header("Location: ../login_area.php");
    }
*/